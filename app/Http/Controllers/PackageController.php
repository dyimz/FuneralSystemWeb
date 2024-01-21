<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Service;
use App\Models\Deceased;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Orderline;
use Yajra\Datatables\Datatables;
use App\Rules\UniqueServicesForPackage;
use Illuminate\Support\Facades\Validator;
use DB;
use DateTime;
use Illuminate\Validation\Rule;
use App\Events\CremationNotify;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $packages = Package::orderBy('name', 'asc')->get();

        // dd($packages);
        if ($request->ajax()) {
            $data = $packages;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.packages.action')
                    ->make();
        }

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $services = Service::all(); // Fetch all services from the database

        return view('admin.packages.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validate the form data
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Package::class],
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'img_path' => 'required',
            // 'inclusions' => 'array', // Assuming inclusions is an array
            'inclusions' => ['array', new UniqueServicesForPackage()],
        ]);
        // try{
            // Create a new package
            $package = new Package;
            $package->name = $request->input('name');
            $package->description = $request->input('description');
            $package->category = $request->input('category');
            $package->price = $request->input('price');

            if($request->hasFile('img_path'))
            {
                $img_path = $request->file('img_path')->getClientOriginalName();
                $request->file('img_path')->storeAs('public/images', $img_path);
                $package->img = 'storage/images/'.$img_path;
            }

            $package->save();

           // Attach selected services to the package
            if ($request->has('inclusions') && is_array($request->input('inclusions'))) {
                $inclusions = $request->input('inclusions');
                $priceMap = [];

                // Retrieve prices from the database for selected services
                $services = Service::whereIn('id', $inclusions)->get();

                // Associate each selected service with its price
                foreach ($services as $service) {
                    $priceMap[$service->id] = ['price' => $service->price];
                }

                // Sync the selected services with their prices to the package
                $package->services()->sync($priceMap);
            }


            return redirect()->route('packages.index')->with('success', 'Package created successfully');

        // } catch (\Exception $e) {
        //     $errorMessage = "An error occurred while processing your request."; // Custom error message
        //     return back()->withErrors($errorMessage)->withInput();
        // }
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
    public function edit(Package $package)
    {
        $services = Service::all();
        return view('admin.packages.edit',compact('package', 'services'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($package)],
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'inclusions' => ['array', new UniqueServicesForPackage($package)],
        ]);
        // dd($request);
        // dd($package);

        // Update package attributes
        $package->name = $request->input('name');
        $package->description = $request->input('description');
        $package->category = $request->input('category');
        $package->price = $request->input('price');
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('img_path')) {
            $img_path = $request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->storeAs('public/images', $img_path);
            $package->img = 'storage/images/' . $img_path;
        }
    
        $package->save();
    
        // Attach selected services to the package
        if ($request->has('inclusions') && is_array($request->input('inclusions'))) {
            $inclusions = $request->input('inclusions');
            $priceMap = [];
    
            // Retrieve prices from the database for selected services
            $services = Service::whereIn('id', $inclusions)->get();
    
            // Associate each selected service with its price
            foreach ($services as $service) {
                $priceMap[$service->id] = ['price' => $service->price];
            }
    
            // Sync the selected services with their prices to the package
            $package->services()->sync($priceMap);
        }
    
        // Redirect or return a response as needed
        return redirect()->route('packages.index')->with('success', 'Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function availPackage(Package $package)
    {
        return view('customer.availPackage', compact('package'));
    }

    public function orderPackage(Request $request)
    {
        $package = Package::find($request->packageid);
        $user = auth()->user();

        //Create Deceased
        $dead = new Deceased;
        $dead->customer_id = $user->customer->id;
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
        $dead->idtype = $request->idtype;

        if($request->hasFile('image')){
            $img_path = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $img_path);
            $image = 'storage/images/'.$img_path;
        }

        if($request->hasFile('validid')){
            $img_path = $request->file('validid')->getClientOriginalName();
            $request->file('validid')->storeAs('public/images', $img_path);
            $validid = 'storage/images/'.$img_path;
            $dead->validid = $validid;
        }

        if($request->hasFile('transferpermit')){
            $img_path = $request->file('transferpermit')->getClientOriginalName();
            $request->file('transferpermit')->storeAs('public/images', $img_path);
            $transferpermit = 'storage/images/'.$img_path;
            $dead->transferpermit = $transferpermit;
        }

        if($request->hasFile('transferpermit')){
            $img_path = $request->file('transferpermit')->getClientOriginalName();
            $request->file('transferpermit')->storeAs('public/images', $img_path);
            $transferpermit = 'storage/images/'.$img_path;
        }
        if($request->hasFile('swabtest')){
            $img_path = $request->file('swabtest')->getClientOriginalName();
            $request->file('swabtest')->storeAs('public/images', $img_path);
            $swabtest = 'storage/images/'.$img_path;
            $dead->swabtest = $swabtest;
        }
        if($request->hasFile('proofofdeath')){
            $img_path = $request->file('proofofdeath')->getClientOriginalName();
            $request->file('proofofdeath')->storeAs('public/images', $img_path);
            $proofofdeath = 'storage/images/'.$img_path;
            $dead->proofofdeath = $proofofdeath;
        }

        $dead->image = $image;
        $dead->save();

        if($request->mop == 'GCASH') {
            if($request->hasFile('pop')){
                $img_path = $request->file('pop')->getClientOriginalName();
                $request->file('pop')->storeAs('public/images', $img_path);
                $POP = 'storage/images/'.$img_path;
            }
        } else {
            $POP = null;
        }

        $order = new Order;
        $order->user_id = $user->id;
        $order->name = $user->name;
        $order->address = $user->customer->address;
        $order->contact = $user->customer->contact;
        $order->subtotal = $package->price;
        $order->discounted = 'NO';
        $order->total_price = $package->price;
        // if($user->customer->verified)
        // {
        //     $order->total_price = $package->price * 0.8;
        //     $order->discounted = 'YES';
        // } else {
        //     $order->total_price = $package->price;
        //     $order->discounted = 'NO';
        // }

        $order->MOP = $request->mop;
        $order->POP = $POP;
        $order->type = 'PACKAGE';
        $order->package_id = $package->id;
        $order->deceased_id = $dead->id;
        $order->status = 'PLACED';
        $order->paymentstatus = 'NOT PAID';

        $order->message = $request->message;
        $order->cascketsize = $request->casketOption;
        $order->formalin = $request->formalin;
        $order->memorialproducts = $request->products;
        $order->makeup = $request->makeup;
        $order->cremate = $request->cremate;
        $order->note = $request->note;
        $order->locationfrom = $request->locationfrom;
        $order->locationto = $request->locationto;
        $order->durationfrom = $request->durationfrom;
        $order->durationto = $request->durationto;
        $order->save();

        foreach($order->package->services as $service)
        {
            $orderline = New Orderline;
            $orderline->order_id = $order->id;
            $orderline->name = $service->name;
            $orderline->price = $service->price;
            $orderline->save();
        }

        if($request->cremate === 'YES')
        {
            $notify = new Notification;
            $notify->title = 'Cremation Request!';
            $notify->description = 'Order #'.$order->id.' requested Cremation for their order.';
            $notify->save();

            // UNCOMMENT FOR LIVE NOTIFICATION
            // event(new CremationNotify($order->id));
        }

        return redirect()->route('confirmationPackage', ['order' => $order->id]);
        // dd("Order Placed");

    }
}
