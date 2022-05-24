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
        Schema::create('estandars', function (Blueprint $table) {
            //id del estandar de competencia
            $table->id();
            $table->string('titulo');
            $table->string('proposito');
            $table->string('descripcion');
            $table->string('sector_productivo');
            $table->foreignId('nivel_id')->unsigned()->nullable();;
            $table->foreign('modulo_ocupacional_id')->references('id')->on('nivels');
            $table->foreignId('modulo_ocupacional_id')->unsigned()->nullable();
            $table->foreign('nivel_id')->references('id')->on('modulo_ocupacionals');
            

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
        Schema::dropIfExists('estandars');
    }
};
