<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Yajra\Datatables\Datatables;
use DB;
use DateTime;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = Employee::all();

        if ($request->ajax()) {
            $data = $employees;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.employees.action')
                    ->make();
        }

        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'sex' => ['required', 'string'],
            'address' => ['required', 'string'],
            'birthdate' => ['required', 'date', 'before:today'],
            'contact' => ['required', 'digits:11'],
            'image' => ['required'],
            'username' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            ],
            [
                'birthdate.before' => 'Date invalid. The birthdate must be before today.',
                'contact.digit' => 'Contact must be 11 digits.',

        ]);


        // dd($request);
        try{

            $user = new User;
            $user->username = $request->username;
            $user->name = ucfirst($request->fname) . ' ' . ucfirst($request->lname);
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'employee';
            $user->status = 'ACTIVE';
            $user->save();

            // dd("HEY");
            $emp = new Employee;
            $emp->user_id = $user->id;
            $emp->fname = $request->fname;
            $emp->lname = $request->lname;
            $emp->birthdate = $request->birthdate;
            $emp->address = $request->address;
            $emp->sex = $request->sex;
            $emp->contact = $request->contact;

            $today = new DateTime();
            $birthDate = new DateTime($request->birthdate);
            $emp->age = $today->diff($birthDate)->y;
            // dd($emp, $user);

            if ($request->hasFile('image')) {
                $img_path = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/images', $img_path);
                $image = 'storage/images/'.$img_path;

                $emp->image = $image;
            }
        
            $emp->save();

            return redirect()->route('employees.index');

        } catch (\Exception $e) {
            $errorMessage = "An error occurred while processing your request."; // Custom error message
            return back()->withErrors($errorMessage)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact(
            'employee',
        ));
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
    public function update(Request $request, Employee $employee)
    {

        // $employee->fname = ucfirst($request->fname);
        
        $user = User::find($employee->user_id);
        $user->name = ucfirst($request->fname) . ' ' . ucfirst($request->lname);
        $user->save();

        $full_name = $request->fname;
        $names = explode(' ', $full_name);
        $cap_name = array_map('ucfirst', $names);

        $employee->fname = implode(' ', $cap_name);
        $employee->lname = ucfirst($request->lname);

        $employee->birthdate = $request->birthdate;
        $employee->sex = $request->sex;
        $employee->address = $request->address;
        $employee->contact = $request->contact;

        $today = new DateTime();
        $birthDate = new DateTime($request->birthdate);
        $employee->age = $today->diff($birthDate)->y;

        if ($request->hasFile('image')) {
            $img_path = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $img_path);
            $image = 'storage/images/'.$img_path;

            $employee->image = $image;
        }
        $employee->save(); 

    

        return redirect()->back()->with('reload', true);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
