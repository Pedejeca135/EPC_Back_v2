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

             $table->foreignId('criterio_id')->nullable();
             $table->foreign('criterio_id')->references('id')->on('criterios')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('calificacion');


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
