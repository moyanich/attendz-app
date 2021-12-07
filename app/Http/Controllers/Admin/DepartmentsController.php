<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\User;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DB;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the departments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //$departments = Departments::orderBy('id', 'DESC')->paginate(10);

       // TODO: Find the eloquent way

       if(Gate::denies('hr-access')  ) {
            dd('no');
       }

       if(Gate::allows('admin')  ) {
            $departments = Departments::select('departments.*', 
                DB::raw('CONCAT(employees.firstname, " " , employees.lastname) as managerName'), 
                DB::raw('CONCAT(userSup.firstname, " " , userSup.lastname) as supervisorName'))
                    ->leftJoin('employees', 'departments.manager_id', '=', 'employees.id')
                    ->leftJoin('employees as userSup', 'departments.supervisor_id', '=', 'userSup.id')
                    ->orderBy('id', 'asc')->paginate(15);
        
            return view('admin.departments.index', compact('departments'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new department.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $users = User::orderBy('firstname')->get()->pluck('full_name', 'id')->toArray();
        $employees = Employees::orderBy('firstname')->get()->pluck('full_name', 'id')->toArray();
        return view('admin.departments.create', compact('employees'));
    }

    /**
     * Store a newly created department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
            [
                'name' => 'required|unique:departments'
            ]
        );

        $department = new Departments;
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->manager_id = $request->input('manager');
        $department->supervisor_id = $request->input('supervisor');
        $department->save();
        
        return redirect()->route('admin.departments.index')->with('success', 'New Department - ' . $department->name . ' created successfully');
    }

    // TODO: Look up Route Model Binding
    /**
     * Handle the Department "show/edit" event.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function show(Departments $department)    
    {
       // $users = User::orderBy('firstname')->get()->pluck('full_name', 'id')->toArray();
        $employees = Employees::orderBy('firstname')->get()->pluck('full_name', 'id')->toArray();
        return view('admin.departments.show', ['department' => $department, 'employees' => $employees]);        
    }

    /**
     * Update the specified department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $department)
    {
        $this->validate($request, 
            [
                'name' => 'required'
            ]
        );

        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->manager_id = $request->input('manager');
        $department->supervisor_id = $request->input('supervisor');
        $department->save();

        return redirect()->back()->with('success', "Department record for " . $department->name . " updated sucessfully!");
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')
            ->with('success', 'Department record for ' . $department->name . ' deleted successfully!');
    }
}
