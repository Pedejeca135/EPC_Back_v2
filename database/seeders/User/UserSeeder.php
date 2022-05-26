<?php

namespace Database\Seeders\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use app\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /******* ADMINS ************/
        //el admin 1
        $userAdmin1 = new User();
        $userAdmin1->email = "admin1@email.com";
        $userAdmin1->password = Hash::make("soyElAdmin1");
        $userAdmin1->role = 0;
        $userAdmin1->save();

        //el admin 2 
        $userAdmin2 = new User();
        $userAdmin2->email = "admin2@email.com";
        $userAdmin2->password = Hash::make("soyElAdmin2");
        $userAdmin2->role = 0;
        $userAdmin2->save();

        /******* EVALUADORES ************/
        //evaluador 1
        $evaluador1 = new User();
        $evaluador1->email = "evaluador1@email.com";
        $evaluador1->password = Hash::make("soyElEvaluador1");
        $evaluador1->role = 1;
        $evaluador1->save();

        //evaluador 2
        $evaluador2 = new User();
        $evaluador2->email = "evaluador2@email.com";
        $evaluador2->password = Hash::make("soyElEvaluador2");
        $evaluador2->role = 1;
        $evaluador2->save();

        /******* CANDIDATOS ************/
        //candidato 1
        $candidato1 = new User();
        $candidato1->email = "candidato1@email.com";
        $candidato1->password = Hash::make("soyElCandidato1");
        $candidato1->role = 2;
        $candidato1->save();

        //candidato 2
        $candidato2 = new User();
        $candidato2->email = "candidato2@email.com";
        $candidato2->password = Hash::make("soyElCandidato2");
        $candidato2->role = 2;
        $candidato2->save();

        //candidato 3
        $candidato3 = new User();
        $candidato3->email = "candidato3@email.com";
        $candidato3->password = Hash::make("soyElCandidato3");
        $candidato3->role = 2;
        $candidato3->save();

    }
}
