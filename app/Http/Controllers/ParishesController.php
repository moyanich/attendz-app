<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParishesRequest;
use App\Http\Requests\UpdateParishesRequest;
use App\Models\Parishes;

class ParishesController extends Controller
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
     * @param  \App\Http\Requests\StoreParishesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParishesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parishes  $parishes
     * @return \Illuminate\Http\Response
     */
    public function show(Parishes $parishes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parishes  $parishes
     * @return \Illuminate\Http\Response
     */
    public function edit(Parishes $parishes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParishesRequest  $request
     * @param  \App\Models\Parishes  $parishes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParishesRequest $request, Parishes $parishes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parishes  $parishes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parishes $parishes)
    {
        //
    }
}
