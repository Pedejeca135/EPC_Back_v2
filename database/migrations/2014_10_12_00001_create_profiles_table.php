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
        Schema::create('profiles', function (Blueprint $table) {
            // same as $table->bigIncrements('id');
            $table->id();

            //llave foranea que especifica a el usuario al que le pertenece el perfil 
            $table->foreignId('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            /*DATOS PERSONALES DEL USUARIO */
            $table->string('nombres');
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->char('genero');//MFLGBTQIAP
            
            //único
            $table->string('RFC');
            $table->string('NSS');
            $table->string('CURP');
            $table->string('telefono');

            //oDmicilio
            $table->string('calle');
            $table->string('numero');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('pais');
            $table->string('CP');

            //Natalidad 
            $table->date('fecha_nacimiento')->format('d-m-Y');
            $table->string('ciudad_nacimiento');
            $table->string('estado_nacimiento');
            $table->string('pais_nacimiento');
        
            //para los tokens de sesión 
            $table->rememberToken();
            
            //para los logs
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
        Schema::dropIfExists('profiles');
    }
};
