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
        Schema::create('opcion_selecteds', function (Blueprint $table) {
            //opckon selected id
            $table->id();

            $table->foreignId('opcion_id')->nullable();
            $table->foreign('opcion_id')->references('id')->on('opcions')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreignId('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('users');
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
        Schema::dropIfExists('opcion_selecteds');
    }
};