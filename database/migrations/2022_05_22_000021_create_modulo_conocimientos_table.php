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
        Schema::create('modulo_conocimientos', function (Blueprint $table) {
            //id modulo conocimiento
            $table->id();
            $table->foreignId('conocimiento_id');
            $table->foreign('conocimiento_id')->references('id')->on('conocimientos');
            $table->string('titulo');
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
        Schema::dropIfExists('modulo_conocimientos');
    }
};
