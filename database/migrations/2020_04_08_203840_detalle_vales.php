<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleVales extends Migration
{

    public function up()
    {
        Schema::create('detalle_vales', function (Blueprint $table) {
        $table->increments('ID_DVAL');     

        $table->integer('ID_VAL')->unsigned();
        $table->foreign('ID_VAL')->references('ID_VAL')->on('vales');
        
        $table->string('Concepto',150);
        $table->integer('Monto');
        $table->string('UUID',50);
        $table->integer('Diferencia');

        $table->rememberToken();
        $table->timestamps();
        $table->SoftDeletes();
});
    }

    public function down()
    {
        Schema::drop('detalle_vales');
    }
}
