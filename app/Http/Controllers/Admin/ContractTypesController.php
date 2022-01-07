<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContractTypesRequest;
use App\Http\Requests\UpdateContractTypesRequest;
use App\Models\ContractTypes;

class ContractTypesController extends Controller
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
     * @param  \App\Http\Requests\StoreContractTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContractTypes  $contractTypes
     * @return \Illuminate\Http\Response
     */
    public function show(ContractTypes $contractTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContractTypes  $contractTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractTypes $contractTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContractTypesRequest  $request
     * @param  \App\Models\ContractTypes  $contractTypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContractTypesRequest $request, ContractTypes $contractTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContractTypes  $contractTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractTypes $contractTypes)
    {
        //
    }
}
