<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('descripcion');
            $table->string('codigo', 8)->unique();
            $table->integer('area_id')->unsigned();
            $table->string('area_nombre');
            $table->integer('categoria_id')->unsigned();
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_type');
            $table->string('url');
            $table->integer('lecturas');
            $table->softDeletes();

            $table->timestamp('created_at');
            $table->timestamp('updated_at');

            $table->index('id');
            $table->index('codigo');
            $table->index('area_id');
            $table->index('categoria_id');

            $table->foreign('categoria_id')->references('id')->on('categorias_documentos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('documentos');
    }
}
