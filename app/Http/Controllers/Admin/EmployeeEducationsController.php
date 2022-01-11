<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeEducationsRequest;
use App\Http\Requests\UpdateEmployeeEducationsRequest;
use App\Models\EmployeeEducations;
use App\Models\Employees;
use App\Models\EducationTypes;


class EmployeeEducationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($employee_id)
    {
        $employee = Employees::findOrFail($employee_id);
        $educationTypes = EducationTypes::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table
        return view('admin.employees.education', compact('employee', 'educationTypes'));

        //return view('admin.employees.job.edit', compact('job', 'jobs', 'departments', 'contracts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeEducationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($employee_id, StoreEmployeeEducationsRequest $request)
    {
        $education = new EmployeeEducations();
        $education->employee_id = $id;
        $education->institution = $request->input('school');
        $education->education_types_id = $request->input('education');
        $education->course = $request->input('course');
        $education->startYear = $request->input('start');
        $education->endYear = $request->input('end');
        $education->save(); 
        return redirect()->route('admin.employees.show', $id)->with('success', 'Education saved'); // Redirect to employee profile
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeEducations  $employeeEducations
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeEducations $employeeEducations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeEducations  $employeeEducations
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeEducations $employeeEducations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeEducationsRequest  $request
     * @param  \App\Models\EmployeeEducations  $employeeEducations
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeEducationsRequest $request, EmployeeEducations $employeeEducations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeEducations  $employeeEducations
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeEducations $employeeEducations)
    {
        //
    }
}
