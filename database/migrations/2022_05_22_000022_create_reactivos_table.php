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
        Schema::create('reactivos', function (Blueprint $table) {
            //id reactivo
            $table->id();
            $table->string('enunciado');

            $table->integer('valor');

            $table->foreignId('modulo_conocimiento_id');
            $table->foreign('modulo_conocimiento_id')->references('id')->on('modulo_conocimientos');

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
        Schema::dropIfExists('reactivos');
    }
};
