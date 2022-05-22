<?php

namespace App\Http\Controllers;

use App\Models\Users\Evaluador_asignado;
use App\Http\Requests\StoreEvaluador_asignadoRequest;
use App\Http\Requests\UpdateEvaluador_asignadoRequest;

class EvaluadorAsignadoController extends Controller
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
     * @param  \App\Http\Requests\StoreEvaluador_asignadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvaluador_asignadoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users\Evaluador_asignado  $evaluador_asignado
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluador_asignado $evaluador_asignado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users\Evaluador_asignado  $evaluador_asignado
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluador_asignado $evaluador_asignado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvaluador_asignadoRequest  $request
     * @param  \App\Models\Users\Evaluador_asignado  $evaluador_asignado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvaluador_asignadoRequest $request, Evaluador_asignado $evaluador_asignado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users\Evaluador_asignado  $evaluador_asignado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluador_asignado $evaluador_asignado)
    {
        //
    }
}
