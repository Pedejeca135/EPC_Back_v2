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

    //rutas auth
    Route::get('user-profile', [UserController::class,'userProfile']);//perfil de usuario
    Route::get('logout', [UserController::class,'logout']);

    //rutas para la evaluacion
    /*Route::get("show-evaluacion",[CandidatoController::class, "showEvaluaciones"]);
    Route::get("show-evaluacion",[CandidatoController::class, "showEvaluacion"]);*/


});


/*TODAS LAS RUTAS QUE SON PARA ADMINISTRADORES*/
Route::group(['middleware' => ["auth:sanctum", "Admin"]], function(){

    /*RUTAS  DE ESTANDARES */

    //rutas para los estandares

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


/*RUTAS PARA LOS EVALUADORES*/
Route::group(['middleware' => ["auth:sanctum", "Evaluador"]], function(){

    //rutas para la evaluacion
    Route::post("hacer-evaluacion",[EvaluacionController::class, "hacerEvaluacion"]);

    //rutas para hacer reportes 

    //rutas para listar evaluados
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


