<?php

namespace App\Http\Controllers\Api\Evaluador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Estandares\Estandar;

use App\Models\Estandares\Elementos\Criterio;
use App\Models\Estandares\Elementos\CriterioCalificado;
use App\Models\Estandares\Elementos\Desempenyo;
use App\Models\Estandares\Elementos\Elemento;
use App\Models\Estandares\Elementos\Producto;
use App\Models\Estandares\Elementos\ReporteEvaluacion;
use App\Models\Estandares\Elementos\PeticionEstandar;

class AdminController extends Controller
{
   /*ESTANDARES */

    //rutas para los estandares:
    public function crearEstandar(Request $request){
        $request->validate([
            'titulo' => 'required|email|unique:users',
            'proposito' => 'required',            
            'descripcion' => 'required' ,   
            'nivel_id' => 'exist:nivels,id' ,          
            'modulo_ocupacional_id' => 'exist:modulo_ocupacionals,id' ,         
            'sector_productivo_id' => 'exist:sector_productivos,id' ,                    
        ]);
        
        $estandar = Estandar::create($request->all());

        $estandar ->save();

        return response()->json([
            "status" => 1,
            "msg" => "estandar creado correctamente",
        ]);   
    }

    public function actualizarEstandar(Request $request,$id){
        $request->validate([
            
            'titulo' => '',
            'proposito' => '',            
            'descripcion' => '' ,   
            'nivel_id' => 'exist:nivels,id' ,          
            'modulo_ocupacional_id' => 'exist:modulo_ocupacionals,id' ,         
            'sector_productivo_id' => 'exist:sector_productivos,id' ,                    
        ]);

        $estandar = Post::find($id);    
        $estandar->fill($request->input())->save();
      
        return response()->json([
            "status" => 1,
            "msg" => "estandar creado correctamente",
        ]);   
    }


    //rutas para elementos:
    //-recive un json con el id del estandar y la informacion del elemento
    public function crearElemento(){
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'            
        ]);
    }

    //rutas para desempeños:
    //-recive un json con el id del elemento y la informacion del desempeño
    public function crearDesempenyo(){
        $request->validate([
            '' => 'required|email|unique:users',
            '' => 'required|confirmed'            
        ]);
    }

    //rutas para productos:
    //-recive un json con el id del elemento y la informacion del producto
    public function crearProducto(){
        $request->validate([
            '' => 'required|email|unique:users',
            '' => 'required|confirmed'            
        ]);
    }

    //rutas para criterios:
    //-recive un json con el id del elemento y la informacion del producto
    public function crearCriterio(){
        $request->validate([
            '' => 'required|email|unique:users',
            '' => 'required|confirmed'            
        ]);
    }


    
    /*CONOCIMIENTOS */
    //rutas para conocimientos:
    //-recive un json con el id del estandar y la informacion del conocimiento
    public function crearConocimiento(){

    }

    //rutas para modulo conocimiento:
    //-recive un json con el id del conocimiento y la informacion del modulo del conocimiento
    public function crearModuloConocimiento(){

    }

    //rutas para reactivos
    //-recive un json con el id del modulo de conocimiento y la informacion del reactivo
    public function crearReactivo(){

    }

    //rutas para opciones
    //-recive un json con el id del reactivo la informacion del la opcion para el reactivo
    public function crearOpcion(Request $request){

    }

    /*ASIGNACIONES*/
    //rutas de asignacion de evaluadores
    //ruta para listar la tabla de peticiones de estandares
    public function getPeticionesEstandar(){
        $peticionesEstandares = PeticionEstandar::orderBy('status', 'candidato_id' )->get();
        return response()->json([
            $peticionesEstandares
        ]); 
    }

    //-recive un json con el id del evaluador y el del candidato asi como el id del estandar
    public function asignarEvaluador(){

    }

    /*RUTAS PARA EL CAMBIO DE ROLES PARA LOS USUARIOS*/
    //-recibe json con el id del usuario y el nombre del rol que se quiera asignar-> 'Candidato'-> 2, 'Evaluador' -> 1 'Admin' -> 0
    public function cambiarRol(Request $request){
        $request->validate([         
            'user_id' => 'exist:sector_productivos,id' ,      
            'role' => 'regex:admin|evaluador|user'              
        ]);

        //si el administrador intenta cambiar su propio rol, no podra ya que esto podria generar un error si se trata del unico admin
        if(auth()->user()->id == $request->user_id)
        {
            return response()->json([
                "status" => 0,
                "msg" => "no puede cambiar su propio rol",
            ]);  
        }
        else{

            $user = User::findOrFail($request->user_id);

            switch($request->role){
                case "admin":
                    $user->role = 0;
                case "evaluador":
                    $user->role = 1;
                default :
                    $user->role = 2;
            }
        }

    }
}
