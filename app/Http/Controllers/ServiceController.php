<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Service;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $services = Service::all();
        if ($request->ajax()) {
            $data = $services;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.services.action')
                    // ->addColumn('checkbox', function($row){
                    //     return '<input type="checkbox" name="sl_checkbox" data-id="'.$row['id'].'"><label></label>';
                    // })
                    // ->rawColumns(['checkbox','action'])
                    ->make();
        }

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDATION
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Service::class],
            'price' => 'required|numeric|min:0',
            ],
            [
                'name.unique' => 'Service name already used.',
                'name.required' => 'Service name is required.',

                'price.required' => 'The price field is required.',
                'price.numeric' => 'The price must be a numeric value.',
                'price.min' => 'The price must not be a negative number.',
        ]);

        try{
            // dd("HEY");
            $packages = new Service;
            $packages->name = $request->name;
            $packages->price = $request->price;

            $packages->save();

            return redirect()->route('services.index');

        } catch (\Exception $e) {
            $errorMessage = "An error occurred while processing your request."; // Custom error message
            return back()->withErrors($errorMessage)->withInput();
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
    public function edit(Service $service)
    {
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('services')->ignore($id),],
            'price' => 'required|numeric|min:0',
        ],
        [
            'name.unique' => 'Product name already used.',
            'name.required' => 'Product name is required.',

            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a numeric value.',
            'price.min' => 'The price must not be a negative number.',
    ]);
    
    // try{
        
        $updates = [
            'name' => $request->name,
            'price' => $request->price,
        ];

        Service::where('id', $id)->update($updates);
            
        return redirect()->route('services.index')->with('success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
