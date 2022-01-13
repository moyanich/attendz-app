<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeEducationsRequest;
use App\Http\Requests\UpdateEmployeeEducationsRequest;
use App\Models\EmployeeEducations;
use App\Models\Employees;
use App\Models\EducationTypes;
use App\Models\Genders;

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

        return view('admin.employees.education.create', compact('employee', 'educationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeEducationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeEducationsRequest $request)
    {
        $education = new EmployeeEducations();
        $education->employee_id = $request->input('employee_id');
        $education->institution = $request->input('school');
        $education->education_types_id = $request->input('education');
        $education->course = $request->input('course');
        $education->startYear = $request->input('start');
        $education->endYear = $request->input('end');
        $education->save(); 

        return redirect()->route('admin.employees.show', $education->employee_id)->with('success', 'Education saved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeEducations  $employeeEducations
     * @return \Illuminate\Http\Response
     */
    public function edit($employee_id, $id)
    {
        $empEducation = EmployeeEducations::findOrFail($id);
        $educationTypes = EducationTypes::pluck('name', 'id')->prepend('Please select', '');

        return view('admin.employees.education.edit', compact('empEducation', 'educationTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeEducationsRequest  $request
     * @param  \App\Models\EmployeeEducations  $employeeEducations
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeEducationsRequest $request, $employee_id, $id)
    {
        //$empEducation = EmployeeEducations::findOrFail($id);
        
        $empEducation = EmployeeEducations::findOrFail($id);
        $empEducation->institution = $request->input('school');
        $empEducation->education_types_id = $request->input('education');
        $empEducation->course = $request->input('course');
        $empEducation->startYear = $request->input('start');
        $empEducation->endYear = $request->input('end');
        $empEducation->save();

        return redirect()->route('admin.employees.show', $empEducation->employee_id)->with('success', 'Education updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeEducations  $employeeEducations
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id, $id)
    {
        $empEducation = EmployeeEducations::findOrFail($id);
        $empEducation->delete();

        return redirect()->route('admin.employees.show', $empEducation->employee_id)->with('success', 'Course ' . $empEducation->course . ' removed sucessfully');
    }
}
