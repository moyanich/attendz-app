<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeaveManagementRequest;
use App\Http\Requests\UpdateLeaveManagementRequest;
use App\Models\LeaveManagement;

class LeaveManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leavetypes = LeaveManagement::select('leave_management.*', 'status_codes.name as status')
            ->leftJoin('status_codes', 'leave_management.status_id', '=', 'status_codes.id')
            ->orderBy('leave_management.id', 'asc')->paginate(5); 

        return view('admin.leavemanagement.index', compact('leavetypes'));
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
     * @param  \App\Http\Requests\StoreLeaveManagementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveManagementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveManagement  $leaveManagement
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveManagement $leaveManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveManagement  $leaveManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveManagement $leaveManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveManagementRequest  $request
     * @param  \App\Models\LeaveManagement  $leaveManagement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveManagementRequest $request, LeaveManagement $leaveManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveManagement  $leaveManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveManagement $leaveManagement)
    {
        //
    }
}
