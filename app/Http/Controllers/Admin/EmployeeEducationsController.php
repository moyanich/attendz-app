<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeEducationsRequest;
use App\Http\Requests\UpdateEmployeeEducationsRequest;
use App\Models\EmployeeEducations;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeEducationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeEducationsRequest $request)
    {
        //
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
