<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeFilesRequest;
use App\Http\Requests\UpdateEmployeeFilesRequest;
use App\Models\EmployeeFiles;

class EmployeeFilesController extends Controller
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
     * @param  \App\Http\Requests\StoreEmployeeFilesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeFilesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeFiles  $employeeFiles
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeFiles $employeeFiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeFiles  $employeeFiles
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeFiles $employeeFiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeFilesRequest  $request
     * @param  \App\Models\EmployeeFiles  $employeeFiles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeFilesRequest $request, EmployeeFiles $employeeFiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeFiles  $employeeFiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeFiles $employeeFiles)
    {
        //
    }
}
