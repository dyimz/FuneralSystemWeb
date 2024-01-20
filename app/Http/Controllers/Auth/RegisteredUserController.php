<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use DB;
use DateTime;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'username' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'birthdate' => ['required', 'date', 'before:today'],
            'sex' => ['required', 'string', 'in:MALE,FEMALE'],
            'contact' => ['required', 'numeric', 'digits:11'],
            'address' => ['required', 'string'],
            'custimage' => ['required'],
            'idtype' => ['required', 'string'],
            'validid' => ['required'],
        ],
        [
            'fname.required' => 'Please enter first name.',
            'lname.required' => 'Please enter last name.',
            'birthdate.required' => 'Please enter birthdate.',
            'birthdate.date' => 'Invalid format.',
            'birthdate.before' => 'Date invalid. The birthdate must be before today.',
            'sex.required' => 'Please enter sex.',
            'contact.required' => 'Please enter contact.',
            'contact.numeric' => 'Invalid format.',
            'contact.digits' => 'Contact number should be 11 digits only.',
            'address.required' => 'Please enter address.',

            'idtype.required' => 'Please enter ID type.',
            'custimage.required' => 'Please upload image.',
            'validid.required' => 'Please upload image.',
    ]);


        // dd($request);
        $full_name = $request->fname;
        $names = explode(' ', $full_name);
        $cap_name = array_map('ucfirst', $names);
        $first_name = implode(' ', $cap_name);

        $user = new User;
        $user->username = $request->username;
        $user->name =  $first_name . ' ' . ucfirst($request->lname);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'customer';
        $user->status = 'ACTIVE';

        $user->save();

        $customer = new Customer;
        $customer->user_id = $user->id;
        $customer->fname = $first_name;
        $customer->lname = ucfirst($request->lname);
        $customer->birthdate = $request->birthdate;

        $today = new DateTime();
        $birthDate = new DateTime($request->birthdate);
        $customer->age = $today->diff($birthDate)->y;
        
        $customer->sex = $request->sex;
        $customer->address = $request->address;
        $customer->contact = $request->contact;
        $customer->idtype = $request->idtype;
        $customer->verified = 0;

        if ($request->hasFile('validid')) {
            $img_path = $request->file('validid')->getClientOriginalName();
            $request->file('validid')->storeAs('public/images', $img_path);
            $custvalidid = 'storage/images/'.$img_path;

            $customer->custvalidid = $custvalidid;
        }

        if ($request->hasFile('custimage')) {
            $img_path = $request->file('custimage')->getClientOriginalName();
            $request->file('custimage')->storeAs('public/images', $img_path);
            $custimage = 'storage/images/'.$img_path;

            $customer->custimage = $custimage;
        }

        if ($request->hasFile('custgcashqr')) {
            $img_path = $request->file('custgcashqr')->getClientOriginalName();
            $request->file('custgcashqr')->storeAs('public/images', $img_path);
            $custgcashqr = 'storage/images/'.$img_path;

            $customer->custgcashqr = $custgcashqr;
        }

        // dd($user, $customer);
        $customer->save();
        // Retrieve the user's cart. If the user doesn't have a cart, create one.
        $cart = $user->cart ?? $user->cart()->create();
        $kart = session()->get('cart', []);
        $kart[$cart->id] = [
            'id' => $cart->id,
            'total_price' => $cart->total_price,
            'items' => $cart->products,
        ];
        session()->put('cart', $kart);
        
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('customer.products');
    }

}
