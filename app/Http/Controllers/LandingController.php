<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Package;
use App\Models\Order;
use App\Models\Deceased;
use DB;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::orderBy('name', 'asc')->get();
        $deceased = Deceased::all();

        $groups = [];

        $chunkSize = 3;
        $groupIndex = 0;
        $innerIndex = 0;

        foreach ($deceased as $record) {
            $groups[$groupIndex][$innerIndex] = $record;

            $innerIndex++;

            // Check if we need to move to the next group
            if ($innerIndex == $chunkSize) {
                $innerIndex = 0;
                $groupIndex++;
            }
        }

        // if (!empty($groups)) {
        //     // Use array_slice to skip the first array
        //     $remainingGroups = array_slice($groups, 1);
        
        //     foreach ($remainingGroups as $groupIndex => $group) {

        
        //         foreach ($group as $recordIndex => $record) {
               
        //         }
        //     }
        // }
        // dd();

        // foreach($groups as $group)
        // {
        //     foreach($group as $dead)
        //     {
        //         dump($dead->fname);
        //     }
        // }

        // dd();
        return view('welcome', compact('packages', 'groups'));
    }

    public function showObituary($id)
    {
        $dead = Deceased::find($id);
        return view('showObituary', compact('dead'));
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
        $deliveryFee = 90;
        return view('customer.checkout', compact('deliveryFee'));
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
