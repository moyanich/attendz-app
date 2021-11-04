<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\User;
use Illuminate\Http\Request;
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
       $departments = Departments::select('departments.*', 
            DB::raw('users.name as managerName'), 
            DB::raw('userSup.name as supervisorName'))
                ->leftJoin('users', 'departments.manager_id', '=', 'users.id')
                ->leftJoin('users as userSup', 'departments.supervisor_id', '=', 'userSup.id')
                ->orderBy('id', 'DESC')->paginate(15);
      
        return view('admin.departments.index', compact('departments'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new department.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->pluck('name', 'id')->toArray();
        return view('admin.departments.create', compact('users'));
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
                'name'  => 'required|unique:departments'
            ]
        );

       // $department = new Departments;
       // $department->name = $request->input('name');
       // $department->description = $request->input('description');
        //$department->manager_id  = $request->input('manager');
       // $department->supervisor_id = $request->input('supervisor');
        //$department->save();
        $newDepartment = $request->all();
        $department = Departments::create($newDepartment);
        $department->manager()->sync($request->input('manager'));
        
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
        $users = User::orderBy('name')->pluck('name', 'id')->toArray();
        return view('admin.departments.show', ['department' => $department, 'users' => $users]);        
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
                'name'  => 'required'
            ]
        );

        $department->name = $request->input('name');
        $department->description = $request->input('description');
        $department->manager_id  = $request->input('manager');
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
            ->with('success', 'Department record deleted successfully!');
    }
}
