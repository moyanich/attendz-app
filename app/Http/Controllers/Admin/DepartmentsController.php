<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the departments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Departments::orderBy('id', 'DESC')->paginate(10);

        /* 
            NOTE: example of Gate::denies
            if(Gate::denies('logged-in')) {
                dd('no access');
            } 


            //$departments = Departments::orderBy('id', 'asc')->paginate(15);
        $departmentsCount = Departments::count();

        $departments = Departments::select('departments.*', 
        DB::raw('CONCAT(employees.first_name, " " , employees.last_name) as managerName'), DB::raw('CONCAT(e.first_name, " " , e.last_name) as supervisorName'))
            ->leftJoin('employees', 'departments.manager_id', '=', 'employees.empID')
            ->leftJoin('employees as e', 'departments.supervisor_id', '=', 'e.empID')
            ->orderBy('id', 'asc')->paginate(15);

        return view('departments.index')
            ->with('title', $title)
            ->with('departments', $departments);
        */
        return view('admin.departments.index', compact('departments'))
            ->with('i', ($request->input('page', 1) - 1) * 5)
            ;

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

        $newDepartment = $request->all();
        $department = Departments::create($newDepartment);
        
        return redirect()->route('admin.departments.index')->with('success', 'New Department - ' . $department->name . ' created successfully');
    }

    /**
     * Display the specified department.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function show(Departments $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified department.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Departments $departments)
    {
        //
    }

    /**
     * Update the specified department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $departments)
    {
        //
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $departments)
    {
        //
    }
}
