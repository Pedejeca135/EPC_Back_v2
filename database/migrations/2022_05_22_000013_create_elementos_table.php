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
        Schema::create('elementos', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->string('codigo')->unique(); //->nullable();

            $table->foreignId('estandar_competencia_id')->unsigned()->nullable();
            $table->foreign('estandar_competencia_id')
                ->references('id')
                ->on('estandars')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->boolean('es_auto_evaluacion');

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
        Schema::dropIfExists('elementos');
    }
};