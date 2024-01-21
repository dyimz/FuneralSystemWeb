<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{

    public function addToCart(Request $request, Product $product)
    {
        // dd(session('cart'));
        // Retrieve the authenticated user
        $user = auth()->user();
        // Retrieve the user's cart. If the user doesn't have a cart, create one.
        $cart = $user->cart ?? $user->cart()->create();
    
        // Check if the product is already in the cart
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();
    
        if ($existingProduct) {
            // If the product is already in the cart, update the quantity
            $existingProduct->pivot->update([
                'quantity' => $existingProduct->pivot->quantity + 1,
            ]);
        } else {
            // If the product is not in the cart, add it with quantity 1
            $cart->products()->attach($product, ['quantity' => 1]);
        }
    
        // Update the total price of the cart
        $cart->updateTotalPrice();
        
        $kart = session()->get('cart', []);
        $kart[$cart->id] = [
            'id' => $cart->id,
            'total_price' => $cart->total_price,
            'items' => $cart->products,
        ];
        session()->put('cart', $kart);

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function removeFromCart(Request $request, Product $product)
    {
        // Retrieve the authenticated user
        $user = auth()->user();
    
        // Retrieve the user's cart. If the user doesn't have a cart, create one.
        $cart = $user->cart ?? $user->cart()->create();
    
        // Check if the product is in the cart
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();
    
        if ($existingProduct) {
            // If the product is in the cart, detach it
            $cart->products()->detach($product);
    
            // Update the total price of the cart
            $cart->updateTotalPrice();
    
            // Update the session cart
            $kart = session()->get('cart', []);
            if (isset($kart[$cart->id])) {
                $kart[$cart->id] = [
                    'id' => $cart->id,
                    'total_price' => $cart->total_price,
                    'items' => $cart->products,
                ];
                session()->put('cart', $kart);
            }
    
            return redirect()->back()->with('success', 'Product removed from cart');
        }
    
        return redirect()->back()->with('error', 'Product not found in cart');
    }

    public function add(Request $request, Product $product)
    {
        // Retrieve the authenticated user
        $user = auth()->user();
        // Retrieve the user's cart. If the user doesn't have a cart, create one.
        $cart = $user->cart ?? $user->cart()->create();
    
        // Check if the product is already in the cart
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();
    
        if ($existingProduct) {
            // If the product is already in the cart, update the quantity
            $existingProduct->pivot->update([
                'quantity' => $existingProduct->pivot->quantity + 1,
            ]);
        } else {
            // If the product is not in the cart, add it with quantity 1
            $cart->products()->attach($product, ['quantity' => 1]);
        }
    
        // Update the total price of the cart
        $cart->updateTotalPrice();
        
        $kart = session()->get('cart', []);
        $kart[$cart->id] = [
            'id' => $cart->id,
            'total_price' => $cart->total_price,
            'items' => $cart->products,
        ];
        session()->put('cart', $kart);

        return redirect()->back();
    }

    public function remove(Request $request, Product $product)
    {
        // Retrieve the authenticated user
        $user = auth()->user();
    
        // Retrieve the user's cart. If the user doesn't have a cart, create one.
        $cart = $user->cart ?? $user->cart()->create();
    
        // Check if the product is already in the cart
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();
    
        if ($existingProduct) {
            // If the product is already in the cart, update the quantity
            $newQuantity = $existingProduct->pivot->quantity - 1;
    
            if ($newQuantity > 0) {
                // If the new quantity is greater than 0, update the quantity
                $existingProduct->pivot->update([
                    'quantity' => $newQuantity,
                ]);
            } else {
                // If the new quantity is 0, remove the product from the cart
                $cart->products()->detach($product);
            }
        } else {
            // If the product is not in the cart, add it with quantity 1
            $cart->products()->attach($product, ['quantity' => 1]);
        }
    
        // Update the total price of the cart
        $cart->updateTotalPrice();
    
        // Store the cart information in the session
        $kart = session()->get('cart', []);
        $kart[$cart->id] = [
            'id' => $cart->id,
            'total_price' => $cart->total_price,
            'items' => $cart->products,
        ];
        session()->put('cart', $kart);
    
        // Redirect back to the previous page
        return redirect()->back();
    }
    

    
    


    public function oldaddToCart($id)
    {        
        $product =  Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id] = [
                'name' => $product->name,
                'img' => $product->img,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => 1
            ];
        }
        // Session::forget('cart');
        // dd(session('cart'));
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product added to cart');
    }
}
