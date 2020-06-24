<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Motivos extends Migration
{

    public function up()
    {
        Schema::create('motivos', function (Blueprint $table) {
            $table->increments('ID_MOT');     
    
            $table->string('Motivo',150);

            $table->rememberToken();
            $table->timestamps();
            $table->SoftDeletes();
    });
    }

    
    public function down()
    {
        Schema::drop('motivos');
    }
}
