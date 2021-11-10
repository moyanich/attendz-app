<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employees::orderBy('emp_no', 'DESC')->paginate(10);
        return view('admin.employees.index', compact('employees'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::where('name', 'like', '%Employee%')->first();
        return view('admin.employees.create')->with('role', $role);
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //emp_no

        $this->validate($request, [
            'emp_no' => 'required|unique:employees',
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role'  => 'required',
        ]);


        $employee = new Employees;
        $employee->emp_no = $request->input('emp_no');
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->save();
    
        /*
        $user = new User;
        $user->emp_no = $request->input('emp_no');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->save(); 
        */
       
        $newUser = $request->except(['_token', 'roles']);
        $user = User::create($newUser);
        $user->roles()->sync($request->input('role'));

        Password::sendResetLink($request->only(['email']));

       // $employee->emp_no

       
        //<a href="'. url('/admin/employees/') . $employee->emp_no . '">
        return redirect()->route('admin.employees.index')->with('success', "New employee created successfully. <a href='{ url('/admin/employees') }'>Click here</a>. The employee was sent a login information to resend the activation email.");
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
