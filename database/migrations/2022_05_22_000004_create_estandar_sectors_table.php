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
        Schema::create('estandar_sectors', function (Blueprint $table) {
            $table->id();
            // unsigned()->
            // $table->foreignId('estandar_id')->nullable();
            $table->string('estandar_id')->nullable();
            $table->foreign('estandar_id')->references('codigo')->on('estandars');

            $table->foreignId('sector_productivos_id')->unsigned()->nullable();
            $table->foreign('sector_productivos_id')->references('id')->on('sector_productivos');


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
        Schema::dropIfExists('estandar_sectors');
    }
};