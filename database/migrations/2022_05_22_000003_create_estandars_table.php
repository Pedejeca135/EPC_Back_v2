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

            $table->string('codigo')->unique();
            
            $table->string('titulo');
            $table->string('proposito');
            $table->string('descripcion');

            $table->string('comite_desarrollo')->nullable();

            $table->foreignId('nivel_id')->unsigned()->nullable();
            $table->foreign('nivel_id')->references('id')->on('nivels');

            $table->string('modulo_ocupacional')->nullable();
           
            // $table->foreignId('sector_productivos_id')->unsigned()->nullable();
            // $table->foreign('sector_productivos_id')->references('id')->on('sector_productivos');

            $table->string('link_documento')->nullable();
            
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
