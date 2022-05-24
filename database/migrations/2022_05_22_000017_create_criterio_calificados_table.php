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
        Schema::create('criterio_calificados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criterio_id');
            $table->foreign('criterio_id')->references('id')->on('criterios');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('calificacion');
            $table->foreignId('reporte_evaluacion_id');
            $table->foreign('reporte_evaluacion_id')->references('id')->on('reporte_evaluacions');
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
        Schema::dropIfExists('criterio_calificados');
    }
};
