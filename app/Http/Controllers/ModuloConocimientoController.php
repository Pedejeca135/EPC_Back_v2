<?php

namespace App\Http\Controllers;

use App\Models\estandares\conocimiento\modulo_conocimiento;
use App\Http\Requests\Storemodulo_conocimientoRequest;
use App\Http\Requests\Updatemodulo_conocimientoRequest;

class ModuloConocimientoController extends Controller
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
     * @param  \App\Http\Requests\Storemodulo_conocimientoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemodulo_conocimientoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estandares\conocimiento\modulo_conocimiento  $modulo_conocimiento
     * @return \Illuminate\Http\Response
     */
    public function show(modulo_conocimiento $modulo_conocimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estandares\conocimiento\modulo_conocimiento  $modulo_conocimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(modulo_conocimiento $modulo_conocimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemodulo_conocimientoRequest  $request
     * @param  \App\Models\estandares\conocimiento\modulo_conocimiento  $modulo_conocimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemodulo_conocimientoRequest $request, modulo_conocimiento $modulo_conocimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estandares\conocimiento\modulo_conocimiento  $modulo_conocimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(modulo_conocimiento $modulo_conocimiento)
    {
        //
    }
}
