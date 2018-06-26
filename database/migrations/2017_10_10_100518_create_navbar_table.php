<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavbarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar', function (Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('nombre');
            $table->string('ruta');
            $table->string('direccion');
            $table->tinyInteger('orden');
            $table->boolean('habilitado');

            $table->index('id');

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
        Schema::drop('navbar');
    }
}
