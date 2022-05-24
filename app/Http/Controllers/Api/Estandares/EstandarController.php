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
    public function create(Request $request)
    {
        //
        $request->validate([
            'titulo' => "required",
            'proposito' => "required",
            'descripcion' => "required",
            'sector_productivo' => "required",
            'nivel_id' => "required",
            'modulo_ocupacional_id' => "required"
        ]);

        $user_id = auth()->user()->id;

        /*
        $evaluacion = new Evaluacion();
        $evaluacion->user_id = $user_id;
        $evaluacion->title = $request->title;
        $evaluacion->content = $request->content;
        */

        // $evaluacion->save();

        /*
        $estandar = Estandar::create([
            'titulo' => $request->titulo,
            'proposito' => $request->proposito,
            'descripcion' => $request->descripcion,
            'sector_productivo' => $request->sector_productivo,
            'nivel_id' => $request->nivel_id,
            'modulo_ocupacional_id' => $request->modulo_ocupacional_id
        ]);
        */

        $estandar = Estandar::create($request->all());
        // $estandar->

        //respuesta de la API
        return response([
            "status" => 1,
            "msg" => "estandar creado exitosamente",
        ]);
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
    //(Request $request, $id)
    {
        //
        $user_id = auth()->user()->id;
        if(Evaluacion::where(["user_id"=> $user_id, "id"=> $id])->exists())
        {
            //si existe lo actualizamos
            $evaluacion = Evaluacion::find($id);

            $evaluacion->title = isset($request->title) ? $request->title: $evaluacion->title;
            $evaluacion->content = isset($request->content) ? $request->content: $evaluacion->content;

            //respuesta de la API
            return response([
                "status" => 1,
                "msg" => "Evaluacion actualizada correctamente",
            ]);
        }
        else{
            return response([
                "status" => 0,
                "msg" => "no se encontro esa evaluacion"
            ], 404);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estandares\Estandar  $estandar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estandar $estandar)
    //($id)
    {
        //
        $user_id = auth()->user()->id;
        if(Evaluacion::where(["id"=> $id, "user_id"=> $user_id])->exists())
        {
            $evaluacion = Evaluacion::where(["id"=> $id, "user_id"=> $user_id])->exists();
            $evaluacion->delete();

             //respuesta de la API
             return response([
                "status" => 1,
                "msg" => "Evaluacion eliminada correctamente",
            ]);

        }
        else{
             //respuesta de la API
             return response([
                "status" => 0,
                "msg" => "No se encontro la evaluacion",
            ],404);
        }
    }
}
