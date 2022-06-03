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
    Route::post('subir-conocimiento', [UserController::class,'subirConocimiento']);
    Route::post('subir-opcion-respuesta', [UserController::class,'subirOpcionRespuesta']);

    Route::get('es-admin', [UserController::class,'esAdmin']);
    Route::get('es-evaluador', [UserController::class,'esEvaluador']);
});


/*RUTAS PARA LOS EVALUADORES*/
Route::group(['middleware' => ["auth:sanctum", "Evaluador"]], function(){

    //rutas para la evaluacion:
    //-recive el id del estandar
    Route::get("/eval/estandar",[EvaluadorController::class, "getEstandar"]);

    //rutas para listar evaluados:
    //-recive json con nombre de el usuario y el id del estandar
    Route::get('/eval/mis-evaluados', [EvaluadorController::class,'getEvaluados']);

    //-recive el id del evaluado
    Route::post("/eval/estandares-de-evaluado",[EvaluadorController::class, "getEstandaresDeEvaluado"]);

    //-recive json con nombre de el usuario y el id estandar, y cada criterio con calificacion
    Route::post("/eval/hacer-evaluacion",[EvaluadorController::class, "hacerEvaluacion"]);

    //rutas para generar reportes:
    //-recive json con nombre de el usuario 
    Route::get('/eval/generar-reportes', [EvaluadorController::class,'generarReportes']);

    //-recive json con nombre de el usuario y el id del estandar
    Route::get('/eval/generar-reporte', [EvaluadorController::class,'generarReporte']);

    //RUTAS EVALUACION:

     //rutas para criterios:
     //-recive un json con el id del criterio y del evaluado
     Route::post('/eval/evaluar-criterio', [EvaluadorController::class,'evaluarCriterio']);
});


/*TODAS LAS RUTAS QUE SON PARA ADMINISTRADORES*/
Route::group(['middleware' => ["auth:sanctum", "Admin"]], function(){

    /*RUTAS  DE ESTANDARES */

    //rutas para los estandares:
    Route::post('/admin/crear-estandar', [AdminController::class,'crearEstandar']);

    //rutas para elementos:
    //-recive un json con el id del estandar y la informacion del elemento
    Route::post('/admin/crear-elemento', [AdminController::class,'crearElemento']);

    //rutas para desempeños:
    //-recive un json con el id del elemento y la informacion del desempeño
    Route::post('/admin/crear-desempenyo', [AdminController::class,'crearDesempenyo']);

    //rutas para productos:
    //-recive un json con el id del elemento y la informacion del producto
    Route::post('/admin/crear-producto', [AdminController::class,'crearProducto']);

    //rutas para criterios:
    //-recive un json con el id del elemento y la informacion del producto
    Route::post('/admin/crear-criterio', [AdminController::class,'crearCriterio']);
    
    /*RUTAS  DE CONOCIMIENTOS */
    //rutas para conocimientos:
    //-recive un json con el id del estandar y la informacion del conocimiento
    Route::post('/admin/crear-Conocimiento', [AdminController::class,'crearConocimiento']);

    //rutas para modulo conocimiento:
    //-recive un json con el id del conocimiento y la informacion del modulo del conocimiento
    Route::post('/admin/crear-modulo-conocimiento', [AdminController::class,'crearModuloConocimiento']);

    //rutas para reactivos
    //-recive un json con el id del modulo de conocimiento y la informacion del reactivo
    Route::post('/admin/crear-reactivo', [AdminController::class,'crearReactivo']);

    //rutas para opciones
    //-recive un json con el id del reactivo la informacion del la opcion para el reactivo
    Route::post('/admin/crear-opcion', [AdminController::class,'crearOpcion']);

    /*RUTAS DE ASIGNACIONES*/
    //rutas de asignacion de evaluadores
    //ruta para listar la tabla de peticiones de estandares
    Route::post('/admin/lista-peticiones', [AdminController::class,'getPeticionesEstandar']);

    //-recive un json con el id del evaluador y el del candidato asi como el id del estandar
    Route::post('/admin/asignar-evaluador', [AdminController::class,'asignarEvaluador']);

    /*RUTAS PARA EL CAMBIO DE ROLES PARA LOS USUARIOS*/
    //-recibe json con el id del usuario y el nombre del rol que se quiera asignar-> 'Candidato'-> 2, 'Evaluador' -> 1 'Admin' -> 0
    Route::get('/admin/cambiar-rol', [EvaluadorController::class,'cambiarRol']);
});







































Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


