<?php

Route::group(['prefix' => 'noticias'], function() {

    //Tabla de noticias
    Route::get('index/{orden?}/{param?}', [
        'as' => 'noticias.index',
        'middleware' => 'permission:listar.noticias',
        'uses' => 'NoticiasController@index'
    ]);

    //Buscar noticia
    Route::get('buscar',[
        'as' => 'noticias.buscar',
        'uses' => 'NoticiasController@buscar'
    ]);

    //Crear nueva noticia
    Route::get('noticias/create', [
        'as' => 'noticias.create',
        'middleware' => 'permission:crear.noticia',
        'uses' => 'NoticiasController@createForm'
    ]);

    Route::post('noticias/create', [
        'as' => 'noticias.create',
        'middleware' => 'permission:crear.noticia',
        'uses' => 'NoticiasController@crearNoticia'
    ]);

    Route::delete('', [
        'as' => 'noticias.eliminarTodas',
        'middleware' => 'permission:eliminar.noticia',
        'uses' => 'NoticiasController@eliminarTodas'
    ]);

    //Editar noticia
    Route::group(['prefix' => '{id}'], function (){

        //Ver noticia
        Route::get('', [
            'as' => 'noticias.verNoticia',
            'uses' => 'NoticiasController@verNoticia'
        ]);

        //Ver relacionadas por TAG
        Route::get('relacionadas', [
            'as' => 'noticias.relacionadas',
            'uses' => 'NoticiasController@relacionadas'
        ]);

        //Editar noticia
        Route::get('editar', [
            'as' => 'noticias.editar',
            'middleware' => 'permission:editar.noticia',
            'uses' => 'NoticiasController@show'
        ]);

        //Actualizar noticia
        Route::put('editar', 'NoticiasController@edit');

        //Eliminar noticia
        Route::delete('editar', 'NoticiasController@destroy');

        //Recuperar noticia
        Route::put('', [
            'as' => 'noticias.restore',
            'middleware' => 'permission:recuperar.noticia',
            'uses' => 'NoticiasController@restore'
        ]);

    });

});
