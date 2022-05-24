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
    Route::post('peticion-estandar', [UserController::class,'pedirEstandar'])->middleware('TienePerfil');

    //realizar el examen de conocimiento:
    //-recibe el id del estandar en cuestion
    Route::get('conocimiento', [UserController::class,'getConocimiento']);
    Route::get('subir-conocimiento', [UserController::class,'subirConocimiento']);
    Route::get('subir-opcion-respuesta', [UserController::class,'subirOpcionRespuesta']);
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


    //RUTAS MODULAR:
     //rutas para los estandares:
     Route::post('crear-estandar', [EvaluadorController::class,'crearEstandar']);

     //rutas para elementos:
     //-recive un json con el id del estandar y la informacion del elemento
     Route::post('crear-elemento', [EvaluadorController::class,'crearElemento']);
 
     //rutas para desempeños:
     //-recive un json con el id del elemento y la informacion del desempeño
     Route::post('crear-desempenyo', [EvaluadorController::class,'crearDesempenyo']);
 
     //rutas para productos:
     //-recive un json con el id del elemento y la informacion del producto
     Route::post('crear-producto', [EvaluadorController::class,'crearProducto']);
 
     //rutas para criterios:
     //-recive un json con el id del elemento y la informacion del producto
     Route::post('crear-criterio', [EvaluadorController::class,'crearCriterio']);
});


/*TODAS LAS RUTAS QUE SON PARA ADMINISTRADORES*/
Route::group(['middleware' => ["auth:sanctum", "Admin"]], function(){

    /*RUTAS  DE ESTANDARES */

    //rutas para los estandares:
    Route::post('crear-estandar', [AdminController::class,'crearEstandar']);

    //rutas para elementos:
    //-recive un json con el id del estandar y la informacion del elemento
    Route::post('crear-elemento', [AdminController::class,'crearElemento']);

    //rutas para desempeños:
    //-recive un json con el id del elemento y la informacion del desempeño
    Route::post('crear-desempenyo', [AdminController::class,'crearDesempenyo']);

    //rutas para productos:
    //-recive un json con el id del elemento y la informacion del producto
    Route::post('crear-producto', [AdminController::class,'crearProducto']);

    //rutas para criterios:
    //-recive un json con el id del elemento y la informacion del producto
    Route::post('crear-criterio', [AdminController::class,'crearCriterio']);
    
    /*RUTAS  DE CONOCIMIENTOS */

    //rutas para conocimientos:
    //-recive un json con el id del estandar y la informacion del conocimiento
    Route::post('crear-Conocimiento', [AdminController::class,'crearConocimiento']);

    //rutas para modulo conocimiento:
    //-recive un json con el id del conocimiento y la informacion del modulo del conocimiento
    Route::post('crear-modulo-conocimiento', [AdminController::class,'crearModuloConocimiento']);

    //rutas para reactivos
    //-recive un json con el id del modulo de conocimiento y la informacion del reactivo
    Route::post('crear-reactivo', [AdminController::class,'crearReactivo']);

    //rutas para opciones
    //-recive un json con el id del reactivo la informacion del la opcion para el reactivo
    Route::post('crear-opcion', [AdminController::class,'crearOpcion']);

    /*RUTAS DE ASIGNACIONES*/
    //rutas de asignacion de evaluadores
    //ruta para listar la tabla de peticiones de estandares
    Route::post('lista-peticiones', [AdminController::class,'getPeticionesEstandar']);

    //-recive un json con el id del evaluador y el del candidato asi como el id del estandar
    Route::post('asignar-evaluador', [AdminController::class,'asignarEvaluador']);

    /*RUTAS PARA EL CAMBIO DE ROLES PARA LOS USUARIOS*/
    //-recibe json con el id del usuario y el nombre del rol que se quiera asignar-> 'Candidato'-> 2, 'Evaluador' -> 1 'Admin' -> 0
    Route::get('cambiar-rol', [EvaluadorController::class,'cambiarRol']);
});







































Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


