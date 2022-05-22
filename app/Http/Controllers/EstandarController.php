<?php

namespace App\Http\Controllers;

use App\Models\estandares\Estandar;
use App\Http\Requests\StoreEstandarRequest;
use App\Http\Requests\UpdateEstandarRequest;

class EstandarController extends Controller
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
     * @param  \App\Http\Requests\StoreEstandarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstandarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estandares\Estandar  $estandar
     * @return \Illuminate\Http\Response
     */
    public function show(Estandar $estandar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estandares\Estandar  $estandar
     * @return \Illuminate\Http\Response
     */
    public function edit(Estandar $estandar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstandarRequest  $request
     * @param  \App\Models\estandares\Estandar  $estandar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstandarRequest $request, Estandar $estandar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estandares\Estandar  $estandar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estandar $estandar)
    {
        //
    }
}
