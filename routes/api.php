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
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class,'login']);

/*TODAS LAS RUTAS QUE SOLO OCUPAN LA AUTENTICACION NORMAL*/
Route::group(['middleware' => ["auth:sanctum"]], function(){

    //rutas auth
    Route::get('user-profile', [UserController::class,'userProfile']);
    Route::get('logout', [UserController::class,'logout']);

    //rutas para la evaluacion
    Route::post("create-evaluacion",[EvaluacionController::class, "createEvaluacion"]);
    Route::get("list-evaluacion",[EvaluacionController::class, "listEvaluacion"]);
    Route::get("show-evaluacion/{id}",[EvaluacionController::class, "showEvaluacion"]);
    Route::put("update-evaluacion/{id}",[EvaluacionController::class, "updateEvaluacion"]);
    Route::delete("delete-evaluacion/{id}",[EvaluacionController::class, "deleteEvaluacion"]); 
});

/*TODAS LAS RUTAS QUE SON PARA ADMINISTRADORES*/
Route::group(['middleware' => ["auth:sanctum", "Admin"]], function(){
    
});

/*RUTAS PARA LOS EVALUADORES*/
Route::group(['middleware' => ["auth:sanctum", "Evaluador"]], function(){

    //rutas para la evaluacion
    Route::post("create-evaluacion",[EvaluacionController::class, "createEvaluacion"]);
    Route::get("list-evaluacion",[EvaluacionController::class, "listEvaluacion"]);
    Route::get("show-evaluacion/{id}",[EvaluacionController::class, "showEvaluacion"]);
    Route::put("update-evaluacion/{id}",[EvaluacionController::class, "updateEvaluacion"]);
    Route::delete("delete-evaluacion/{id}",[EvaluacionController::class, "deleteEvaluacion"]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


