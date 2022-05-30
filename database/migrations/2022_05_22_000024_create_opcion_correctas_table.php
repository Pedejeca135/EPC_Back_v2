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
        Schema::create('opcion_correctas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('reactivo_id');
            $table->foreign('reactivo_id')->references('id')->on('reactivos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('opcion_correcta_id');
            $table->foreign('opcion_correcta_id')->references('id')->on('opcions')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('opcion_correctas');
    }
};
