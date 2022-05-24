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
        Schema::create('peticion_estandars', function (Blueprint $table) {
            $table->id();

            $table->foreignId('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('users');

            $table->foreignId('estandar_id');
            $table->foreign('estandar_id')->references('id')->on('estandars');

            $table->boolean('status')->default(0);

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
        Schema::dropIfExists('peticion_estandars');
    }
};
