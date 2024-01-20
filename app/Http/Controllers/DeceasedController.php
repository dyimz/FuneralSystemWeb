<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deceased;
use App\Models\Order;
use Yajra\Datatables\Datatables;

class DeceasedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $deads = Deceased::all();

        if ($request->ajax()) {
            $data = $deads;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.deceased.action')

                    ->addColumn('customer', function($row) {
                        $customerName = $row->customer->fname . " " . $row->customer->lname;
                        return '<a href="' . route('customers.show', $row->customer->id) . '">' . $customerName . '</a>';
                    })
                    ->rawColumns(['customer', 'action'])
                    ->make();
        }

        return view('admin.deceased.index', compact('deads'));
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
        $dead = Deceased::find($id);
        // dd($dead);
        return view('admin.deceased.edit',compact('dead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //Create Deceased
        $dead = Deceased::find($id);
        $dead->fname = $request->fname;
        $dead->mname = $request->mname;
        $dead->lname = $request->lname;
        $dead->relationship = $request->relationship;
        $dead->causeofdeath = $request->causeofdeath;
        $dead->sex = $request->sex;
        $dead->religion = $request->religion;

        // Automatically calculate the age based on dateofbirth
        $dead->dateofbirth = $request->dateofbirth;
        $birthdate = new \DateTime($dead->dateofbirth);
        $currentDate = new \DateTime();
        $dead->age = $currentDate->diff($birthdate)->y;

        $dead->dateofdeath = $request->dateofdeath;
        $dead->placeofdeath = $request->placeofdeath;
        $dead->citizenship = $request->citizenship;
        $dead->address = $request->address;
        $dead->civilstatus = $request->civilstatus;
        $dead->occupation = $request->occupation;
        $dead->namecemetery = $request->namecemetery;
        $dead->addresscemetery = $request->addresscemetery;
        $dead->nameFather = $request->nameFather;
        $dead->nameMother = $request->nameMother;

        if($request->hasFile('transferpermit')){
            $img_path = $request->file('transferpermit')->getClientOriginalName();
            $request->file('transferpermit')->storeAs('public/images', $img_path);
            $transferpermit = 'storage/images/'.$img_path;
        }
        if($request->hasFile('swabtest')){
            $img_path = $request->file('swabtest')->getClientOriginalName();
            $request->file('swabtest')->storeAs('public/images', $img_path);
            $swabtest = 'storage/images/'.$img_path;
        }
        if($request->hasFile('proofofdeath')){
            $img_path = $request->file('proofofdeath')->getClientOriginalName();
            $request->file('proofofdeath')->storeAs('public/images', $img_path);
            $proofofdeath = 'storage/images/'.$img_path;
        }
        $dead->transferpermit = $transferpermit;
        $dead->swabtest = $swabtest;
        $dead->proofofdeath = $proofofdeath;

        $dead->save();

        return redirect()->route('deceased.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
