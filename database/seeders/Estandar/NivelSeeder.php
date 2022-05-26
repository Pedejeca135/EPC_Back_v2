<?php

namespace Database\Seeders\Estandar;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use app\Models\Nivel;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /******* ADMINS ************/
        //el admin 1
        $nivel1 = new Nivel();
        $nivel1->nivel = "Uno";
        $nivel1->descripcion= "Desempeña actividades programadas, rutinarias y predecibles.
        Depende de instrucciones y decisiones superiores.";

        $nivel1 = new Nivel();
        $nivel1->nivel = "Dos";
        $nivel1->descripcion = "Desempeña actividades programadas que, en su mayoría, son rutinarias y predecibles.
        Depende de las instrucciones de un superior.
        Se coordina con compañeros de trabajo del mismo nivel jerárquico.";

        $nivel1 = new Nivel();
        $nivel1->nivel = "Tres";
        $nivel1->descripcion = "Desempeña actividades tanto programadas, rutinarias como impredecibles. Recibe
        orientaciones generales e instrucciones específicas acerca de su labor. Requiere
        supervisar y orientar a otros trabajadores jerárquicamente subordinados.";

    }
}
