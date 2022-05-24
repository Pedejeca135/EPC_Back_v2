<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EvaluacionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/

/*RUTAS QUE PARA USUARIOS NO AUTENTICADOS*/
Route::post('register', [UserController::class, 'register']);//registro
Route::post('login', [UserController::class,'login']);//login


/*TODAS LAS RUTAS QUE SOLO OCUPAN LA AUTENTICACION NORMAL*/
Route::group(['middleware' => ["auth:sanctum"]], function(){

    //rutas auth:
    //Route::get('user-profile', [UserController::class,'userProfile']);
    Route::get('logout', [UserController::class,'logout']);

    //perfiles de usuario:
    Route::get('crear-perfil', [UserController::class,'crearPerfil']);
    Route::get('mi-perfil', [UserController::class,'getPerfil'])->middleware('TienePerfil');
    Route::get('editar-perfil', [UserController::class,'editarPerfil'])->middleware('TienePerfil');

    //rutas para los candidatos:
    Route::get('mis-reportes-estandares', [UserController::class,'reportesDeEstandares'])->middleware('TienePerfil');
    //-recibe el json con el id del estandar
    Route::get('mi-reporte-estandar', [UserController::class,'reporteDeEstandar'])->middleware('TienePerfil');

    //rutas para los estandares:
    //-lista todos los estandares disponibles
    Route::get('estandares', [UserController::class,'getEstandares']);
    //-recibe el json con el id del estandar
    Route::get('peticion-estandar', [UserController::class,'pedirEstandar'])->middleware('TienePerfil');

    //realizar el examen de conocimiento:
    //-recibe el id del estandar en cuestion
    Route::get('conocimiento', [UserController::class,'getConocimiento']);
    Route::get('subir-conocimiento', [UserController::class,'subirConocimiento']);
});


/*RUTAS PARA LOS EVALUADORES*/
Route::group(['middleware' => ["auth:sanctum", "Evaluador"]], function(){

    //rutas para la evaluacion:
    //-recive el id del estandar
    Route::get("estandar",[EvaluadorController::class, "getEstandar"]);

    //rutas para listar evaluados:
    //-recive json con nombre de el usuario y el id del estandar
    Route::get('mis-evaluados', [EvaluadorController::class,'getEvaluados']);

    //-recive el id del evaluado
    Route::post("estandares-de-evaluado",[EvaluadorController::class, "getEstandaresDeEvaluado"]);

    //-recive json con nombre de el usuario y el id estandar, y cada criterio con calificacion
    Route::post("hacer-evaluacion",[EvaluadorController::class, "hacerEvaluacion"]);

    //rutas para generar reportes:
    //-recive json con nombre de el usuario 
    Route::get('generar-reportes', [EvaluadorController::class,'generarReportes']);
    //-recive json con nombre de el usuario y el id del estandar
    Route::get('generar-reporte', [EvaluadorController::class,'generarReporte']);

    
});


/*TODAS LAS RUTAS QUE SON PARA ADMINISTRADORES*/
Route::group(['middleware' => ["auth:sanctum", "Admin"]], function(){

    /*RUTAS  DE ESTANDARES */

    //rutas para los estandares
    Route::get('mis-evaluados', [EvaluadorController::class,'getEvaluados']);

    //rutas para elementos

    //rutas para desempeños

    //rutas para productos

    //rutas para criterios

    
    /*RUTAS  DE CONOCIMIENTOS */

    //rutas para conocimientos

    //rutas para modulo conocimiento

    //rutas para reactivos

    //rutas para opciones


    /*RUTAS DE ASIGNACIONES*/
    //rutas de asignacion de 

    //ruta para listar la tabla de peticiones de estandares
});







































Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


