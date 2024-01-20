<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\Datatables\Datatables;
use DB;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('role', '!=', 'admin')->get();

        if ($request->ajax()) {
            $data = $users;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'admin.users.action')
                    ->addColumn('name', function($row) {
                        if ($row->role == 'employee') {
                            $emoloyeeName = $row->employee->fname . " " . $row->employee->lname;
                            return '<a href="' . route('employees.show', $row->employee->id) . '">' . $emoloyeeName . '</a>';
                        } elseif ($row->role == 'customer') {
                            $customerName = $row->customer->fname . " " . $row->customer->lname;
                            return '<a href="' . route('customers.show', $row->customer->id) . '">' . $customerName . '</a>';
                        } else {
                            return $row->name;
                        }

                    })
                    ->addColumn('suspend', function($row) {
                        if ($row->status == 'ACTIVE') {
                            return 
                            '<a href="' . route('admin.user.suspend', $row->id) . '" class="btn btn-icon rounded-pill btn-label-danger" type="button">
                                <i class="tf-icons bx bx-shield-x"></i>
                            </a>';
                        } else {
                            return
                            '<a href="' . route('admin.user.suspend', $row->id) . '" class="btn btn-icon rounded-pill btn-label-success" type="button">
                                <i class="tf-icons bx bx-check-shield"></i>
                            </a>';
                        }

                    })
                    ->rawColumns(['name', 'action', 'suspend'])
                    ->make();
        }

        return view('admin.users.index', compact('users'));
    }

    public function suspendStatus(User $user)
    {
        if($user->status == 'ACTIVE') {
            $user->status = 'SUSPENDED';
            $user->save();
        } else {
            $user->status = 'ACTIVE';
            $user->save();
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function edit(User $user)
    {
        // dd($user);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->role === 'customer')
        {
            if($request->oldpass == null && $request->password == null && $request->password_confirmation == null) 
            {
                $request->validate([
                    'username' => ['required', 'string'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                ]);
            } 
            else
            {
                $request->validate([
                    'username' => ['required', 'string'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                    'oldpass' => [
                        function ($attribute, $value, $fail) use ($id) {
                            $user = User::find($id);
                
                            if (!Hash::check($value, $user->password)) {
                                $fail('The old password is incorrect.');
                            }
                        },
                    ],
                    'password' => [
                        'required',
                        'confirmed',
                        Rules\Password::defaults(),
                        function ($attribute, $value, $fail) use ($id) {
                            // Check if the old password and new password are the same
                            $user = User::find($id);
        
                            if (Hash::check($value, $user->password)) {
                                $fail('The new password should not be the same as the old password.');
                            }
                        },
                    ],
                    'password_confirmation' => ['required'],
                ]);
            }
        } 
        else {
            if($request->password == null && $request->password_confirmation == null) 
            {
                $request->validate([
                    'username' => ['required', 'string'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                ]);
            } 
            else
            {
                $request->validate([
                    'username' => ['required', 'string'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                    'password' => [
                        'required',
                        'confirmed',
                        Rules\Password::defaults(),
                        function ($attribute, $value, $fail) use ($id) {
                            // Check if the old password and new password are the same
                            $user = User::find($id);
        
                            if (Hash::check($value, $user->password)) {
                                $fail('The new password should not be the same as the old password.');
                            }
                        },
                    ],
                    'password_confirmation' => ['required'],
                ]);
            }
        }
       


        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('message', 'Update successfully.');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
