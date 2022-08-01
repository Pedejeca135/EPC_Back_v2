<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluador_asignados', function (Blueprint $table) {
            $table->id();

            //id referenciando al evaluador
            $table->foreignId('user_id_evaluador');
            $table->foreign('user_id_evaluador')->references('id')->on('users');

            //id referenciando al candidato
            $table->foreignId('user_id_candidato');
            $table->foreign('user_id_candidato')->references('id')->on('users');

            //id referenciando el estandar que puede ser evaluado del evaluador al candidato
            $table->string('estandar_id');
            $table->foreign('estandar_id')->references('codigo')->on('estandars');

            //para los logs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluador_asignados');
    }
};