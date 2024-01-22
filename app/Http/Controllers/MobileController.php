<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\User;
use App\Models\Deceased;
use App\Models\Product;
use App\Models\Announcement;
use App\Models\Notification;
use App\Models\Package;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderline;
use Log;
use Validator;
use DB;

class MobileController extends Controller
{

    public function customerregister(Request $request)
    {

        // Log::info($request);

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'failed'], 200);
        }

        $fullName = $request->fname . ' ' . $request->lname;

        $user = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "customer",
        ]);

        $userId = $user->id;
        // Log::info($user);

        // Save the uploaded images
        $custImage = base64_decode($request->customer_image);
        $custValidId = base64_decode($request->valid_id);
        $custGcashQr = base64_decode($request->gcash_qr);

        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        
        $custImageString = '';
        for ($i = 0; $i < $length; $i++) {
            $custImageString .= $characters[random_int(0, $charactersLength - 1)];
        }

        $custValidIdString = '';
        for ($i = 0; $i < $length; $i++) {
            $custValidIdString .= $characters[random_int(0, $charactersLength - 1)];
        }

        $custGcashQrString = '';
        for ($i = 0; $i < $length; $i++) {
            $custGcashQrString .= $characters[random_int(0, $charactersLength - 1)];
        }

        $custImageName = time() .  $custImageString . 'custimage.jpg';
        $custValidIdName = time() . $custValidIdString. 'custvalidid.jpg';
        $custGcashQrName = time() . $custGcashQrString . 'custgcashqr.jpg';

        $custImageLoc = 'images/' . $custImageName;
        $custValidIdLoc = 'images/' . $custValidIdName;
        $custGcashQrLoc = 'images/' . $custGcashQrName;

        file_put_contents(public_path($custImageLoc), $custImage);
        file_put_contents(public_path($custValidIdLoc), $custValidId);
        file_put_contents(public_path($custGcashQrLoc), $custGcashQr);

        $customer = Customer::create([
            'user_id' => $userId,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'age' => $request->age,
            'sex' => $request->sex,
            'address' => $request->address,
            'contact' => $request->contact,
            'idtype' => $request->idtype,
            'custimage' => $custImageLoc,
            'custvalidid' => $custValidIdLoc,
            'custgcashqr' => $custGcashQrLoc,
        ]);

        // Log::info($customer);

        return response()->json(['message' => 'success'], 200);
    }

    public function getProfile($id)
    {
        // Log::info($id);
        // Retrieve the user by the provided ID
        $user = Customer::where('id', $id)->first();
        // Log::info($user);

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Return the user profile information
        return response()->json($user);
    }

    public function deceasedList($id)
    {
        Log::info($id);
        $deceaseds = Deceased::where('customer_id', $id)->get();
        Log::info($deceaseds);
        return response()->json($deceaseds);
    }

    public function addDeceased(Request $request)
    {
        $deceased = Deceased::create([
            'customerID' => $request->customerID,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'relationship' => $request->relationship,
            'causeofdeath' => $request->causeofdeath,
            'sex' => $request->sex,
            'religion' => $request->religion,
            'age' => $request->age,
            'dateofbirth' => $request->dateofbirth,
            'dateofdeath' => $request->dateofdeath,
            'placeofdeath' => $request->placeofdeath,
            'citizenship' => $request->citizenship,
            'address' => $request->address,
            'civilstatus' => $request->civilstatus,
            'occupation' => $request->occupation,
            'namecemetery' => $request->namecemetery,
            'addresscemetery' => $request->addresscemetery,
            'nameFather' => $request->nameFather,
            'nameMother' => $request->nameMother,
        ]);

        $deceasedId = $deceased->id;

        Log::info($deceasedId);

        return response()->json(['message' => 'success'], 200);
    }

    public function productsList()
    {
        $products = Product::all();
        // Log::info($products);
        return response()->json($products);
    }

    public function CasketproductsList()
    {
        $products = Product::where('category', 'Caskets')->get();
        // Log::info($products);
        return response()->json($products);
    }

    public function DressingproductsList()
    {
        $products = Product::where('category', 'Dressings')->get();
        // Log::info($products);
        return response()->json($products);
    }

    public function FlowerproductsList()
    {
        $products = Product::where('category', 'Flowers')->get();
        // Log::info($products);
        return response()->json($products);
    }

    public function UrnproductsList()
    {
        $products = Product::where('category', 'Urns')->get();
        // Log::info($products);
        return response()->json($products);
    }

    public function announcementsList()
    {
        $announcements = Announcement::orderBy('updated_at', 'desc')->get();
        // Log::info($announcements);
        return response()->json($announcements);
    }

    public function notificationsList()
    {
        $notifications = Notification::orderBy('updated_at', 'desc')->get();
        // Log::info($notifications);
        return response()->json($notifications);
    }

    public function packagesList()
    {
        $packages = Package::all();
        // Log::info($packages);
        return response()->json($packages);
    }

    public function EmbalmingpackagesList()
    {
        $packages = Package::where('category', 'EMBALMING')->get();
        // Log::info($packages);
        return response()->json($packages);
    }

    public function CremationpackagesList()
    {
        $packages = Package::where('category', 'CREMATION')->get();
        // Log::info($packages);
        return response()->json($packages);
    }

    public function AllinpackagesList()
    {
        $packages = Package::where('category', 'ALL IN')->get();
        // Log::info($packages);
        return response()->json($packages);
    }

    public function productInfo($id)
    {
        // Log::info($id);
        $products = Product::where('id', $id)->first();
        // Log::info($products);
        return response()->json($products);
    }

    public function packageInfo($id)
    {
        $packages = Package::where('id', $id)->first();
        $inclusions = "";
        $pkcgs = $packages->services;

        foreach ($pkcgs as $pkcg) {
            $inc = $pkcg->name;
            $inclusions = $inclusions.$inc.", ";
        }

        $packagez = ['id' => $packages->id,
                        'name' => $packages->name,
                        'description' => $packages->description,
                        'inclusions' => $packages->inclusions,
                        'img' => $packages->img,
                        'price' => $packages->price,
                        'category' => $packages->category,
                        'inclusions' => $inclusions];

        return response()->json($packagez);
    }

    public function addToCart(Request $request)
    {
        $customer = Customer::where('id', $request->customerID)->first();           // customer info
        $user = User::where('id', $customer->user_id)->first();                     // user info
        $cart = Cart::where('user_id', $user->id)->first();                         // cart details
        $product = Product::where('id', $request->productID)->first();              // product details

        $existingProduct = $cart->products()->where('product_id', $request->productID)->first();    // check if product is already in cart
        
        if ($existingProduct) {
            // If the product is already in the cart, update the quantity
            $existingProduct->pivot->update([
                'quantity' => $existingProduct->pivot->quantity + 1,                // add 1 quantity if in cart
            ]);
        } else {
            // If the product is not in the cart, add it with quantity 1
            $cart->products()->attach($product, ['quantity' => 1]);                 // add if not yet in cart
        }

        $cart->updateTotalPrice();                                                  // edit total price

        return response()->json(['message' => 'success'], 200);
    }

    public function cartList($id)
    {
        $customer = Customer::where('id', $id)->first();                            // customer -> user_id = 11
        $customercart = Cart::where('user_id', $customer->user_id)->first();        // cart -> id = 5
        // Log::info($customercart->products);   

        $products = $customercart->products;                                        // products in cart
        $cartData = [];

        foreach ($products as $product) {
            $cart = ['id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'price' => $product->price,
                        'img' => $product->img,
                        'category' => $product->category,
                        'quantity' => $product->pivot->quantity];
            // Log::info($cart);
            $cartData[] = $cart;
        }
        $cartData = collect($cartData)->sortBy('id')->values()->all();
        // Log::info($cartData);
        return response()->json($cartData);
    }

    public function cartTotal($id)
    {
        $customer = Customer::where('id', $id)->first();                            // customer -> user_id = 11
        $customercart = Cart::where('user_id', $customer->user_id)->first();        // cart -> id = 5

        return response()->json(['message' => $customercart->total_price], 200);
    }

    public function cartDelete(Request $request)
    {
        $customer = Customer::where('id', $request->customerID)->first();           // customer -> user_id = 11
        $customercart = Cart::where('user_id', $customer->user_id)->first();        // cart -> id = 5
        $product = Product::where('id', $request->productID)->first();

        $customercart->products()->detach($product);                                // remove to cart
        $customercart->updateTotalPrice();                                          // update total

        return response()->json(['message' => 'success'], 200);
    }

    public function checkout(Request $request)
    {
        $customer = Customer::where('id', $request->customerID)->first();           // customer -> user_id = 11
        $customercart = Cart::where('user_id', $customer->user_id)->first();        // cart -> id = 5
        $products = $customercart->products;                                        // products in cart

        $order = Order::create([                                                    // create order
            'user_id' => $customer->user_id,
            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'discounted' => 'NO',
            'subtotal' => $customercart->total_price,
            'total_price' => $customercart->total_price,
            'MOP' => $request->modeofpayment,
            'POP' => $request->proofofpayment,
            'type' => 'PRODUCTS',
            'status' => 'PLACED',
            'paymentstatus' => 'NOT PAYED'
        ]);
        $orderId = $order->id;                                                      // get order_id

        foreach ($products as $product) {      
            $orderline = New Orderline;
            $orderline->order_id = $orderId;
            $orderline->name = $product->name;
            $orderline->price = $product->price;
            $orderline->image = $product->img;
            $orderline->quantity = $product->pivot->quantity; 
            $orderline->save();
            Log::info($orderline);
        }

        $customercart->products()->detach();                                        // clear cart products
        
        $cartTotalReset = Cart::find($customercart->id);                            // update total
        $cartTotalReset->total_price = 0;
        $cartTotalReset->save();                                  

        return response()->json(['message' => $order],200);
    }

    public function orderList($id)
    {
        $customer = Customer::where('id', $id)->first();                            // customer -> user_id = 11
        $orders = Order::where('user_id', $customer->user_id)                       // get orders
                            ->orderBy('updated_at', 'desc')->get();;       
        // Log::info($orders);
        return response()->json($orders);
    }

    
}














































