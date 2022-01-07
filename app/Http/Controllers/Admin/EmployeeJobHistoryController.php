<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeJobHistoryRequest;
use App\Http\Requests\UpdateEmployeeJobHistoryRequest;
use App\Models\EmployeeJobHistory;

class EmployeeJobHistoryController extends Controller
{

   
    const STATUS_ACTIVE    = 1;
    const STATUS_SUSPENDED = 2;
    const STATUS_INACTIVE  = 3;
  
    /**
     * Return list of status codes and labels

     * @return array
     */
    public static function listStatus()
    {
        // https://stackoverflow.com/questions/32917944/laravel-where-to-store-statuses-flags-model-class-or-config-folder
        return [
            self::STATUS_ACTIVE    => 'Active',
            self::STATUS_SUSPENDED => 'Suspended',
            self::STATUS_INACTIVE  => 'Inactive'
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = self::listStatus();
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
     * @param  \App\Http\Requests\StoreEmployeeJobHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeJobHistoryRequest $request)
    {
        //
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
    public function edit(EmployeeJobHistory $employeeJobHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeJobHistoryRequest  $request
     * @param  \App\Models\EmployeeJobHistory  $employeeJobHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeJobHistoryRequest $request, EmployeeJobHistory $employeeJobHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeJobHistory  $employeeJobHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeJobHistory $employeeJobHistory)
    {
        //
    }
}
