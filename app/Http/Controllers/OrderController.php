<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Yajra\Datatables\Datatables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::all();
        if ($request->ajax()) {
            $data = $orders;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.orders.action')
                    ->addColumn('dead', function($row) {
                        // Check if the order type is 'PACKAGE'
                        if ($row->type === 'PACKAGE') {
                            // If it is, display the 'deceased' column
                            $deadName = $row->deceased->fname . " " . $row->deceased->lname;
                            return '<a href="' . route('deceased.edit', $row->deceased->id) . '">' . $deadName . '</a>';
                        } else {
                            // If not, return an empty string for the 'deceased' column
                            return '-';
                        }
                    })
                    ->rawColumns(['dead', 'action'])
                    ->make();
        }

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->addressRadio == 0){
        }else{
            $request->validate([
                'address' => 'required|string|max:255',
                'contact' => 'required|numeric',
                ]);
        }

        $user = auth()->user(); // Assuming the user is authenticated
        // Retrieve the user's cart
        $cart = $user->cart;

        // Check if the user has a cart
        if ($cart) {

            if($request->addressRadio == 0){
                $address = $user->customer->address;
                $contact = $user->customer->contact;
            }
            else{
                $address = $request->address;
                $contact = $request->contact;
            }

            if($request->MOP = "cod"){
                $POP = null;
            }
            else{
                if($request->hasFile('POP')){
                    $img_path = $request->file('POP')->getClientOriginalName();
                    $request->file('POP')->storeAs('public/images', $img_path);
                    $POP = 'storage/images/'.$img_path;
                }
            }

            $subtotal = $cart->total_price;
            // dd($request);
            if($user->customer->verified)
            {
                $total_price = ($cart->total_price * 0.8) + 50;
                $discounted = 'YES';
            } else {
                $total_price = $cart->total_price + 50;
                $discounted = 'NO';
            }

            // dd($subtotal, $total_price, $discounted);
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'name' => auth()->user()->name,
                'address' => $address,
                'contact' => $contact,
                'subtotal' => $subtotal,
                'total_price' => $total_price,
                'discounted' => $discounted,
                'MOP' => $request->MOP,
                'POP' => $POP,
                'type' => 'PRODUCTS',
                'paymentstatus' => 'NOT PAYED',
                'status' => 'PLACED',
                // Add other order-related fields as needed
            ]);
    
            // Attach products from the user's cart to the order
            $productIdArray = $cart->products->pluck('id')->toArray();
            $quantitiesArray = $cart->products->pluck('pivot.quantity')->toArray();
            
            $syncData = [];
            
            foreach ($productIdArray as $index => $productId) {
                $syncData[$productId] = ['quantity' => $quantitiesArray[$index]];
            }
            
            $order->products()->sync($syncData);
            
            // Update the order's total price based on the attached products
            // $order->updateTotalPrice();
    
            // Optionally, you can clear the user's cart after checkout
            $cart->products()->detach();
            $cart->updateTotalPrice(); // Make sure to implement this method in your Cart model
            session()->put('cart', []);
            // Redirect or return a response as needed
            // return view('customer.confirmation', compact('order')); 
            return redirect()->route('confirmation', ['order' => $order->id]);
        } else {
            // Handle the case where the user does not have a cart
            return redirect()->back()->with('error', 'User does not have a cart');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::where('id', $id)->first();
        $user = $order->user->id;
        $count = Order::whereHas('user', function ($query) use ($user) {
            $query->where('id', $user);
        })->count();

        return view('admin.orders.edit',compact('order', 'count'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request);
        $order = Order::find($id);

        if($order->type === 'PACKAGE')
        {
            $request->validate([
                'message' => 'required',
                'formalin' => 'required',
                'cascketsize' => 'required',
                'memorialproducts' => 'required',
                'makeup' => 'required',
                'note' => 'required',
                'locationfrom' => 'required',
                'locationto' => 'required',
                'durationfrom' => 'required',
                'durationto' => 'required',
            ]);
        }


        if($request->status == 2){
            $order->status = 'PREPARING';
        }
        elseif($request->status == 3){
            $order->status = 'ON-GOING';
        }
        elseif($request->status == 4){
            $order->status = 'DONE';
        }
        else{
            $order->status = 'PLACED';
        }
        // dd($request);
        $order->paymentstatus = $request->paymentstatus;

        if($order->type === 'PACKAGE')
        {
            $order->message = $request->message;
            $order->formalin = $request->formalin;
            $order->cascketsize = $request->cascketsize;
            $order->memorialproducts = $request->memorialproducts;
            $order->makeup = $request->makeup;
            $order->note = $request->note;
            $order->locationfrom = $request->locationfrom;
            $order->locationto = $request->locationto;
            $order->durationfrom = $request->durationfrom;
            $order->durationto = $request->durationto;
        }
        // dd($order);
        $order->update();

        return redirect()->back()->with('status', 'Status Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function forward(Order $order)
    {
        if($order->status == 'PLACED'){
            $order->status = 'PREPARING';
        }
        elseif($order->status == 'PREPARING'){
            $order->status = 'ON-GOING';
        }
        elseif($order->status == 'ON-GOING'){
            $order->status = 'DONE';
        }

        // dd($order->status);

        $order->update();

        return redirect()->back();
    }

    public function backward(Order $order)
    {
        if($order->status == 'PREPARING'){
            $order->status = 'PLACED';
        }
        elseif($order->status == 'ON-GOING'){
            $order->status = 'PREPARING';
        }
        elseif($order->status == 'DONE'){
            $order->status = 'ON-GOING';
        }

        $order->update();

        return redirect()->back();
    }
}
