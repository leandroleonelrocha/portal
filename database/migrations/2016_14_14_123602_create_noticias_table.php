<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('titulo');
            $table->string('epigrafe');
            $table->text('cuerpo');
            $table->integer('lecturas');
            $table->string('tags');
            $table->integer('categoria_id')->unsigned();
            $table->integer('multimedia_id')->unsigned()->nullable();
            $table->softDeletes();

            $table->index('id');
            $table->index('categoria_id');
            $table->index('multimedia_id');

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('multimedia_id')->references('id')->on('multimedia')->onUpdate('SET NULL')->onDelete('SET NULL');

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
        Schema::drop('noticias');
    }
}
