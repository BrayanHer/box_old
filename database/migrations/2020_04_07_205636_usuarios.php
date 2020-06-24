<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('ID_US');
            $table->string('Nombre',100);
            $table->string('Nomina',100);
            $table->string('Password',100);
            $table->string('Correo',100);
            $table->string('Tipo',100);

           $table->integer('ID_DEPT')->unsigned();
            $table->foreign('ID_DEPT')->references('ID_DEPT')->on('departamentos');
            
        
            $table->rememberToken();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('usuarios');
    }
    
}
