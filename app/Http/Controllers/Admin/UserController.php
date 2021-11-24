<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);

        /* 
            NOTE: example of Gate::denies
            if(Gate::denies('logged-in')) {
                dd('no access');
            } 
        */
        return view('admin.users.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = Role::all();

        $roles =  Role::orderBy('name')->get()->pluck('name', 'id')->toArray();
       
        /* 
            NOTE: example of Gate::allows
            if(Gate::allows('is-admin')) {
                return view('admin.users.create', compact('roles'));
            }
        */
       
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username',
           // 'email' => 'required|email|unique:users,email',
            'email' => 'email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);

        $employee = Employees::firstOrCreate(
            [
                
                'firstname' => $request->input('firstname'), 
                'lastname' => $request->input('lastname'), 
                'email' => $request->input('email'),
                'id' => $request->input('employee_id') ,
            ]
        );
        $employee->save();
        
        //$newUser = $request->all();
        $newUser = $request->except(['_token', 'roles']);
        $user = User::create($newUser);
        $user->roles()->sync($request->input('roles'));

        

        

        Password::sendResetLink($request->only(['email']));

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');

       /* 
            ALSO WORKS
            $user = User::create($request->except(['_token', 'roles']));
            $user->roles()->sync($request->roles); 
        */
    }

    /**
     * Display the User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        //$role_user = 
        return view('admin.users.edit', compact('user', 'roles'));
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
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            //'email' => 'required|email|unique:users,email,'.$id,
            'email' => 'email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ]);
        
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');

       /* return redirect('/employees/'. $employment->employee_id . '/employment')
            ->with('success', 'User updated successfully'); */
    }

    /**
     * Remove the User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }
}
