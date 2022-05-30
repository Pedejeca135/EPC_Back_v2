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
        Schema::create('desempenyos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('elemento_id');
            $table->foreign('elemento_id')
            ->references('id')
            ->on('elementos')
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
        Schema::dropIfExists('desempenyos');
    }
};
