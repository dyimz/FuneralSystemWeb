<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use App\Models\Deceased;

use Yajra\Datatables\Datatables;
use DB;
use DateTime;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function updateSession(){
        $user = auth()->user();
        $cart = $user->cart;
        $kart = session()->get('cart', []);
        $kart[$cart->id] = [
            'id' => $cart->id,
            'total_price' => $cart->total_price,
            'items' => $cart->products,
        ];
        session()->put('cart', $kart);
    }


    public function profile(){
        $customer = auth()->user()->customer;
        $deads = Order::where('deceased_id', '!=', null)->where('user_id', $customer->user->id)->get();
        $orders = Order::where('user_id', $customer->user->id)->get();
        
        $countdeads = count($deads);
        $countorders = count($orders);

       return view('customer.profile.profile', compact(
        'customer', 'deads', 'orders', 'countdeads', 'countorders'
        ));
    }

    public function index(Request $request)
    {
        $customer = Customer::all();

        if ($request->ajax()) {
            $data = $customer;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.customers.action')
                    ->make();
        }

        return view('admin.customers.index', compact('customer'));
    }


    public function show(Customer $customer)
    {
        $deads = Order::where('deceased_id', '!=', null)->where('user_id', $customer->user->id)->get();
        $orders = Order::where('user_id', $customer->user->id)->get();

        $countdeads = count($deads);
        $countorders = count($orders);

        return view('admin.customers.show', compact(
            'customer', 'deads', 'orders', 'countdeads', 'countorders',
        ));
    }
    

    public function customerOrders(Request $request, $id)
    {
        $user = auth()->user();

        if($user->role === 'admin' || $user->role === 'employee'){
            $orders = Order::where('user_id', $id)->get();
        }else{
            $orders = Order::where('user_id', $user->id)->where('status', '!=', 'CANCELLED')->get();
        }


        if ($request->ajax()) {
            $data = $orders;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make();
        }

    }

    public function customerDead(Request $request, $id)
    {
        $user = auth()->user();

        if($user->role === 'admin' || $user->role === 'employee'){
            $find = User::find($id);
            $dead = Deceased::where('customer_id', $find->customer->id)->get();
        }else{
            $dead = Deceased::where('customer_id', $user->customer->id)->get();
        }

        if ($request->ajax()) {
            $data = $dead;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make();
        }
    }


    public function showOrder(Order $order)
    {
        $deads = Order::where('deceased_id', '!=', null)->where('user_id', $order->user->id)->get();
        $orders = Order::where('user_id', $order->user->id)->get();


        // dd($order->user);
        $countdeads = count($deads);
        $countorders = count($orders);

        $customer = $order->user->customer;

        if (auth()->user()->role === 'customer') {
            return view('customer.profile.showOrder', compact('order', 'customer', 'countdeads', 'countorders'));
        } else {
            return view('admin.customers.show.showOrder', compact('order', 'customer', 'countdeads', 'countorders'));
        }
   
    }

    public function showDead($id)
    {
        $dead = Deceased::find($id);
        $deads = Deceased::where('customer_id', $dead->customer_id)->get();
        $orders = Order::where('user_id', $dead->customer->user_id)->get();
        $countdeads = count($deads);
        $countorders = count($orders);

        $customer = $dead->customer;

        if (auth()->user()->role === 'customer') {
            return view('customer.profile.showDead', compact('dead', 'customer', 'countdeads', 'countorders'));
        } else {
            return view('admin.customers.show.showDead', compact('dead', 'customer', 'countdeads', 'countorders'));
        }
    }

    public function changePass()
    {
        $user = auth()->user();
        $customer = $user->customer;
        
        return view('customer.profile.changePass', compact('user', 'customer'));
    }

    public function updateUser(Request $request, $id)
    {
        if($request->oldpass == null && $request->password == null && $request->password_confirmation == null) 
        {
            $request->validate([
                'username' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            ]);
        } 
        else
        {
            $request->validate([
                'username' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                'oldpass' => [
                    function ($attribute, $value, $fail) use ($id) {
                        $user = User::find($id);
            
                        if (!Hash::check($value, $user->password)) {
                            $fail('The old password is incorrect.');
                        }
                    },
                ],
                'password' => [
                    'required',
                    'confirmed',
                    Rules\Password::defaults(),
                    function ($attribute, $value, $fail) use ($id) {
                        // Check if the old password and new password are the same
                        $user = User::find($id);
    
                        if (Hash::check($value, $user->password)) {
                            $fail('The new password should not be the same as the old password.');
                        }
                    },
                ],
                'password_confirmation' => ['required'],
            ]);
        }

        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('message', 'Update successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {

        // dd($customer, $request);
        $full_name = $request->fname;
        $names = explode(' ', $full_name);
        $cap_name = array_map('ucfirst', $names);
        $first_name = implode(' ', $cap_name);

        $customer->fname = $first_name;
        $customer->lname = ucfirst($request->lname);

        $customer->birthdate = $request->birthdate;
        $customer->sex = $request->sex;
        $customer->idtype = $request->idtype;
        $customer->address = $request->address;
        $customer->contact = $request->contact;

        if(auth()->user()->role === 'admin' || auth()->user()->role === 'employee')
        {
            $customer->verified = isset($request->verified) ? true : false;
            if (isset($request->verified)) {
                $customer->verified_at = now();
            } else {
                $customer->verified_at = null;
            }
        }


        $today = new DateTime();
        $birthDate = new DateTime($request->birthdate);
        $customer->age = $today->diff($birthDate)->y;

        if ($request->hasFile('custvalidid')) {
            $img_path = $request->file('custvalidid')->getClientOriginalName();
            $request->file('custvalidid')->storeAs('public/images', $img_path);
            $custvalidid = 'storage/images/'.$img_path;

            $customer->custvalidid = $custvalidid;
        }

        if ($request->hasFile('custimage')) {
            $img_path = $request->file('custimage')->getClientOriginalName();
            $request->file('custimage')->storeAs('public/images', $img_path);
            $custimage = 'storage/images/'.$img_path;

            $customer->custimage = $custimage;
        }

        $customer->user->name = $first_name . " " . $customer->lname;

        //Update all orders
        $orders = Order::where('user_id', $customer->user->id)->get();
        foreach($orders as $order){
            $order->name = $customer->user->name;
            $order->save();
        }
        $customer->user->save();
        $customer->save();

        return redirect()->back()->with('reload', true);
    }

    public function updateCustomer(Request $request, Customer $customer)
    {

        $full_name = $request->fname;
        $names = explode(' ', $full_name);
        $cap_name = array_map('ucfirst', $names);
        $first_name = implode(' ', $cap_name);

        $customer->fname =  $first_name;
        $customer->lname = ucfirst($request->lname);

        $customer->birthdate = $request->birthdate;
        $customer->sex = $request->sex;
        $customer->idtype = $request->idtype;
        $customer->address = $request->address;
        $customer->contact = $request->contact;

        $today = new DateTime();
        $birthDate = new DateTime($request->birthdate);
        $customer->age = $today->diff($birthDate)->y;

        if ($request->hasFile('custvalidid')) {
            $img_path = $request->file('custvalidid')->getClientOriginalName();
            $request->file('custvalidid')->storeAs('public/images', $img_path);
            $custvalidid = 'storage/images/'.$img_path;

            $customer->custvalidid = $custvalidid;
        }

        if ($request->hasFile('custimage')) {
            $img_path = $request->file('custimage')->getClientOriginalName();
            $request->file('custimage')->storeAs('public/images', $img_path);
            $custimage = 'storage/images/'.$img_path;

            $customer->custimage = $custimage;
        }

        $customer->user->name =  $first_name . " " . ucfirst($request->lname);

        //Update all orders
        $orders = Order::where('user_id', $customer->user->id)->get();
        foreach($orders as $order){
            $order->name = $customer->user->name;
            $order->save();
        }
        $customer->user->save();
        $customer->save();

        return redirect()->back()->with('reload', true);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
