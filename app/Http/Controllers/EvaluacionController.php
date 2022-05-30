<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Evaluacion;
use App\Models\Users\Profile;

class EvaluacionController extends Controller
{
    //
    public function createEvaluacion(Request $request){
        $request->validate([
            "title" => "required",
            "content" => "required"
        ]);

        $user_id = auth()->user()->id;

        $evaluacion = new Evaluacion();
        $evaluacion->user_id = $user_id;
        $evaluacion->title = $request->title;
        $evaluacion->content = $request->content;

        $evaluacion->save();

        //respuesta de la API
        return response([
            "status" => 1,
            "msg" => "evaluacion creada exitosamente",
        ]);
    }

    public function listEvaluacion(){
        $user_id = auth()->user()->id;

        $evaluaciones = Evaluacion::where("user_id", $user_id)->get();

        return response([
            "status" => 1,
            "msg" => "listado de evaluaciones",
            "data" => $evaluaciones
        ]);
        
    }

    public function showEvaluacion($id){

        
    }

    public function updateEvaluacion(Request $request, $id){
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

    public function deleteEvaluacion($id){

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
