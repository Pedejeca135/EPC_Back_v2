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
        Schema::create('actitud_habito_valors', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('estandar_id');
            $table->foreign('estandar_id')
            ->references('id')
            ->on('estandars')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('titulo');
            $table->string('descripcion');
            
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
        Schema::dropIfExists('actitud_habito_valors');
    }
};
