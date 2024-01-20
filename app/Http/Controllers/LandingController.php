<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Package;
use App\Models\Order;
use DB;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::orderBy('name', 'asc')->get();

        return view('welcome', compact('packages'));
    }

    public function confirmation(Order $order)
    {
        return view('customer.confirmation', compact('order'));
    }

    public function confirmationPackage(Order $order)
    {
        return view('customer.confirmationPackage', compact('order'));
    }


    public function products()
    {
        
        // dd(session('cart'));
        // session()->forget('cart');
        $products = Product::orderBy('name', 'asc')->get();

        return view('customer.products', compact('products'));
    }

    public function packages()
    {

        // session()->forget('cart');
        $packages = Package::orderBy('name', 'asc')->get();

        return view('customer.packages', compact('packages'));
    }

    public function checkout()
    {
        return view('customer.checkout');
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
