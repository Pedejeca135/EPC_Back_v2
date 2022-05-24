<?php

namespace App\Http\Controllers;

use App\Models\estandares\elementos\Criterio;
use App\Http\Requests\StoreCriterioRequest;
use App\Http\Requests\UpdateCriterioRequest;

class CriterioController extends Controller
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
     * @param  \App\Http\Requests\StoreCriterioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCriterioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estandares\elementos\Criterio  $criterio
     * @return \Illuminate\Http\Response
     */
    public function show(Criterio $criterio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estandares\elementos\Criterio  $criterio
     * @return \Illuminate\Http\Response
     */
    public function edit(Criterio $criterio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCriterioRequest  $request
     * @param  \App\Models\estandares\elementos\Criterio  $criterio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCriterioRequest $request, Criterio $criterio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estandares\elementos\Criterio  $criterio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criterio $criterio)
    {
        //
    }
}
