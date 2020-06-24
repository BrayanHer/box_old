<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('ID_EMP');
            
            $table->string('Nombre',100);
        
            $table->rememberToken();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    public function down()
    {
        Schema::drop('empresas');
    }
}
