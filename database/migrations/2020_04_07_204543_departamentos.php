<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Departamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('ID_DEPT');
            $table->string('Nombre',100);

                $table->integer('ID_EMP')->unsigned();
                $table->foreign('ID_EMP')->references('ID_EMP')->on('empresas');
                
        
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
         Schema::drop('departamentos');
    }
}
