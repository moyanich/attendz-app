<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeJobHistoryRequest;
use App\Http\Requests\UpdateEmployeeJobHistoryRequest;
use App\Models\ContractTypes;
use App\Models\Departments;
use App\Models\Employees;
use App\Models\EmployeeJobHistory;
use App\Models\Jobs;
use App\Models\StatusCodes;
use Carbon\Carbon;

class EmployeeJobHistoryController extends Controller
{
    /**
     * Create the employee job information.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($employee_id)
    {
        $employee = Employees::findOrFail($employee_id);
        $jobs = Jobs::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table
        $departments = Departments::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table
        $contracts = ContractTypes::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table
        return view('admin.employees.job.create', compact('employee', 'jobs', 'departments', 'contracts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeJobHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeJobHistoryRequest $request)
    {
        $today_date = Carbon::now()->format('Y-m-d');
        $job = new EmployeeJobHistory();
        $job->employee_id = $request->input('employee_id');
        $job->job_id = $request->input('job');
        $job->department_id = $request->input('department');
        $job->contract_id = $request->input('contract');
        $job->notification_period = $request->input('notiifcation');
        $job->start_date = $request->input('start');
        $job->end_date = $request->input('end');
        $job->status_id = ($job->end_date >= $today_date || is_null($job->end_date) ) ? StatusCodes::active_status() : StatusCodes::inactive_status();

        $job->save(); 

        // Redirect to employee profile
        return redirect()->route('admin.employees.show', $job->employee_id)->with('success', 'Job profile saved'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeJobHistory  $employeeJobHistory
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeJobHistory $employeeJobHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeJobHistory  $employeeJobHistory
     * @return \Illuminate\Http\Response
     */
    public function edit($employee_id, $id)
    {
        $job = EmployeeJobHistory::findOrFail($id);
        $jobs  = Jobs::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table
        $departments  = Departments::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table
        $contracts = ContractTypes::pluck('name', 'id')->prepend('Please select', ''); // Get Education Type Table

        return view('admin.employees.job.edit', compact('job', 'jobs', 'departments', 'contracts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeJobHistoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeJobHistoryRequest $request, $employee_id, $id)
    {
        $today_date = Carbon::now()->format('Y-m-d');
        $job = EmployeeJobHistory::findOrFail($id);
        $job->job_id = $request->input('job');
        $job->department_id = $request->input('department');
        $job->contract_id = $request->input('contract');
        $job->notification_period = $request->input('notiifcation');
        $job->start_date = $request->input('start');
        $job->end_date = $request->input('end');
        
        //$job->status_id = ($job->end_date < $today_date) ? StatusCodes::inactive_status() : StatusCodes::active_status();
        $job->status_id = ($job->end_date >= $today_date || is_null($job->end_date) ) ? StatusCodes::active_status() : StatusCodes::inactive_status();
        $job->save();

        return redirect()->route('admin.employees.show', $job->employee_id)->with('success', 'Job History updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeJobHistory  $employeeJobHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id, $id)
    {
        $job = EmployeeJobHistory::findOrFail($id);
        $job->delete();
        return redirect()->route('admin.employees.show', $job->employee_id)->with('success', 'Job History removed sucessfully');
    }
}
