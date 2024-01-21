<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\Datatables\Datatables;
use DB;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('name', 'asc')->get();

        if ($request->ajax()) {
            $data = $products;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.products.action')
                    ->make();
        }

        return view('admin.products.index', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDATION
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Product::class],
            'stock' => 'required|numeric|min:0|integer',
            'price' => 'required|numeric|min:0',
            ],
            [
                'name.unique' => 'Product name already used.',
                'name.required' => 'Product name is required.',

                'description.required' => 'Product description is required.',

                'price.required' => 'The price field is required.',
                'price.numeric' => 'The price must be a numeric value.',
                'price.min' => 'The price must not be a negative number.',

                'stock.required' => 'The stock field is required.',
                'stock.numeric' => 'The stock must be a numeric value.',
                'stock.min' => 'The stock must not be a negative number.',
                'stock.integer' => 'The stock must be a whole number.',

        ]);

        try{
            $product = new Product;
            
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category = $request->category;
            $product->stock = $request->stock;

            $data = implode('|', [
                $request->size,
                $request->capacity,
                $request->weight
            ]);

            $product->details = $data;

            if($request->hasFile('img_path'))
            {
                $img_path = $request->file('img_path')->getClientOriginalName();
                $request->file('img_path')->storeAs('public/images', $img_path);
                $product->img = 'storage/images/'.$img_path;
            }
            
            $product->save();



            return redirect()->route('products.index');

        } catch (\Exception $e) {
            $errorMessage = "An error occurred while processing your request. Please try again later."; // Custom error message
            return back()->withErrors($errorMessage)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'name' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($id),],
                'stock' => 'required|numeric|min:0|integer',
                'price' => 'required|numeric|min:0',
                'description' => 'required|max:255',
            ],
            [
                'name.unique' => 'Product name already used.',
                'name.required' => 'Product name is required.',

                'description.max' => 'Description is too long',
                'description.required' => 'Product description is required.',

                'price.required' => 'The price field is required.',
                'price.numeric' => 'The price must be a numeric value.',
                'price.min' => 'The price must not be a negative number.',

                'stock.required' => 'The stock field is required.',
                'stock.numeric' => 'The stock must be a numeric value.',
                'stock.min' => 'The stock must not be a negative number.',
                'stock.integer' => 'The stock must be a whole number.',
        ]);
        
        // try{
            
            $updates = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category' => $request->category,
                'stock' => $request->stock,

                'size' => $request->size,
                'capacity' => $request->capacity,
                'weight' => $request->weight,
            ];

            // FOR IMAGE
            if ($request->hasFile('img_path')) {
                $img_path = $request->file('img_path')->getClientOriginalName();
                $request->file('img_path')->storeAs('public/images', $img_path);

                $updates['img'] = 'storage/images/' . $img_path;
            }

            Product::where('id', $id)->update($updates);
            
            return redirect()->route('products.index');

        // } catch (\Exception $e) {
        //     $errorMessage = "An error occurred while processing your request. Please try again later."; // Custom error message
        //     return back()->withErrors($errorMessage)->withInput();
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id', $id)->delete([]);
        return redirect()->route('admin.products.index');
    }

}
