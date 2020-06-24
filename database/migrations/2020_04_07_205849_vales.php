<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vales', function (Blueprint $table) {

            $table->increments('ID_VAL');     
            $table->integer('Folio'); 

            $table->integer('ID_DEPT')->unsigned();
            $table->foreign('ID_DEPT')->references('ID_DEPT')->on('departamentos');
            
            $table->integer('ID_MOT')->unsigned();
            $table->foreign('ID_MOT')->references('ID_MOT')->on('motivos');
            

            $table->integer('Monto');
            $table->string('Solicitud',50);
            $table->string('Aprobacion',50);
            $table->string('Estado',50);
    
        
            $table->date('Fecha_Comprobar');
            
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
    public function down()
    {
        Schema::drop('vales');
    }
}
