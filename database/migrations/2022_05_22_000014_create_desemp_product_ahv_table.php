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
        Schema::create('desemp_product_ahv', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('elemento_id');
            $table->string('elemento_id');
            $table->foreign('elemento_id')
                ->references('codigo')
                ->on('elementos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('type');
            $table->string('number');
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