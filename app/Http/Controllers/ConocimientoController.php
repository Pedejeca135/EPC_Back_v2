<?php

namespace App\Http\Controllers;

use App\Models\estandares\conocimiento\conocimiento;
use App\Http\Requests\StoreconocimientoRequest;
use App\Http\Requests\UpdateconocimientoRequest;

class ConocimientoController extends Controller
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
     * @param  \App\Http\Requests\StoreconocimientoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreconocimientoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estandares\conocimiento\conocimiento  $conocimiento
     * @return \Illuminate\Http\Response
     */
    public function show(conocimiento $conocimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estandares\conocimiento\conocimiento  $conocimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(conocimiento $conocimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateconocimientoRequest  $request
     * @param  \App\Models\estandares\conocimiento\conocimiento  $conocimiento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateconocimientoRequest $request, conocimiento $conocimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estandares\conocimiento\conocimiento  $conocimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(conocimiento $conocimiento)
    {
        //
    }
}
