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
        $employees = Employees::orderBy('id', 'DESC')->paginate(10);
        
        if(request()->ajax()) {
            return datatables()->of($employees)
            ->addColumn('status', function ($statusRow) {
                if ($statusRow->status == "Active") { 
                    return '<div class="px-2 flex text-sm leading-5 font-semibold bg-transparent rounded-full items-center"><i class="fas fa-circle fa-xs text-emerald-500 mr-1 leading-none"></i>' . $statusRow->status . '</div>'; 
                }
                else if ($statusRow->status == "Inactive") { 
                    return '<div class="px-2 flex text-sm leading-5 font-semibold bg-transparent rounded-full items-center"><i class="fas fa-circle fa-xs text-red-500 mr-1 leading-none"></i>' . $statusRow->status . '</div>'; 
                }
                else { 
                    return ''; 
                }
            })
            ->addColumn('action', function($row) {
                $actionBtn = '
                <div class="flex flex-wrap items-center">
                    <a href="' . route('employees.show', $row->empID) . '" class="flex items-center px-4 py-0.5 text-sm text-emerald-400 hover:text-emerald-100 bg-emerald-100 hover:bg-emerald-400 rounded-none border border-emerald-400 outline-none focus:outline-none mr-3 mb-1 ease-linear transition-all duration-150" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        <span>Edit</span>
                    </a>

                    <a href="' . route('employees.show', $row->empID) . '" class="flex items-center px-4 py-0.5 text-sm text-blue-400 hover:text-blue-100 bg-blue-100 hover:bg-blue-400 rounded-none border border-blue-400 outline-none focus:outline-none mr-3 mb-1 ease-linear transition-all duration-150" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg> 
                        View
                    </a>
                </div>';

                return $actionBtn;
            })
            //->escapeColumns([])
            ->rawColumns(['status', 'action'])
            ->addIndexColumn()
            ->make(true);
        }


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
        $this->validate($request, [
            'id' => 'required|unique:employees',
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role'  => 'required',
        ]);


        $employee = new Employees;
        $employee->id = $request->input('id');
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->save();
    
        /*
        $user = new User;
        $user->id = $request->input('id');
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

        // Redirect to employee profile
        return redirect()->route('admin.employees.show', $request->input('id'))->with('success', "New employee created successfully. Go ahead and complete the employee profile. Activation email sent!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employees::findOrFail($id);

       


        return view('admin.employees.show')
            ->with('employee', $employee);
           // ->with('genders', $genders)
           // ->with('parishes', $parishes)
           // ->with('employments', $employments)
           // ->with('recentEmployment', $recentEmployment); 
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
