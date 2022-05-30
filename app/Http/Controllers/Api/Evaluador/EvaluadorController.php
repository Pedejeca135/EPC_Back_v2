<?php

namespace App\Http\Controllers\Api\Evaluador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluadorController extends Controller
{
    //rutas para la evaluacion:
    //-recive el id del estandar
    public function getEstandar()
    {

    }

    //rutas para listar evaluados:
    //-recive json con nombre de el usuario y el id del estandar
    public function getEvaluados()
    {

    }

    //-recive el id del evaluado
    public function getEstandaresDeEvaluado()
    {
        
    }

    //-recive json con nombre de el usuario y el id estandar, y cada criterio con calificacion
    public function hacerEvaluacion()
    {
        
    }

    //rutas para generar reportes:
    //-recive json con nombre de el usuario 
    public function generarReportes()
    {

    }

    //-recive json con nombre de el usuario y el id del estandar
    public function generarReporte()
    {

    }


    //RUTAS MODULAR:
     //rutas para los estandares:
     public function crearEstandar()
     {

     }

     //rutas para elementos:
     //-recive un json con el id del estandar y la informacion del elemento
     public function crearElemento()
     {

     }
 
     //rutas para desempeños:
     //-recive un json con el id del elemento y la informacion del desempeño
     public function crearDesempenyo()
     {

     }
 
     //rutas para productos:
     //-recive un json con el id del elemento y la informacion del producto
     public function crearProducto()
     {

     }
 
     //rutas para criterios:
     //-recive un json con el id del elemento y la informacion del producto
     public function crearCriterio()
     {

     }
    
}
