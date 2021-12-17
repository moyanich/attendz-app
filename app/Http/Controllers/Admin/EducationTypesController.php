<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationTypesRequest;
use App\Http\Requests\UpdateEducationTypesRequest;
use App\Models\EducationTypes;

class EducationTypesController extends Controller
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
     * @param  \App\Http\Requests\StoreEducationTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EducationTypes  $educationTypes
     * @return \Illuminate\Http\Response
     */
    public function show(EducationTypes $educationTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EducationTypes  $educationTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationTypes $educationTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEducationTypesRequest  $request
     * @param  \App\Models\EducationTypes  $educationTypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationTypesRequest $request, EducationTypes $educationTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationTypes  $educationTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationTypes $educationTypes)
    {
        //
    }
}
