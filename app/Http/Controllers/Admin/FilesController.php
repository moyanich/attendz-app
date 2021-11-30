<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilesRequest;
use App\Http\Requests\UpdateFilesRequest;
use App\Models\Files;

class FilesController extends Controller
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
     * @param  \Illuminate\Http\StoreFilesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function create(StoreFilesRequest $request)
    {
        
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilesRequest $request)
    {

        $this->validate($request, [
            'employee_id' => 'required',
            'description' => 'required',
        ]);

        $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();  

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $request->file->move(public_path('file'), $fileName);

        File::create([
            'employee_id' => auth()->id(),
            'description'
            'name' => $fileName,
            'type' => $type,
            'size' => $size
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show(Files $files)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function edit(Files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilesRequest  $request
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilesRequest $request, Files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy(Files $files)
    {
        //
    }
}
