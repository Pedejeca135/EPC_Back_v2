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
        Schema::create('criterios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('desemp_product_ahv_id');
            $table->foreign('desemp_product_ahv_id')->references('id')->on('desemp_product_ahv')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // $table->string('criterio_type');
            $table->string('enunciado');
            $table->integer('calificacion_maxima')->default(1);
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
        Schema::dropIfExists('criterios');
    }
};