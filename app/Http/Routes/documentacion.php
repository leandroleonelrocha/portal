<?php

Route::get('documentacion/panel-control', [
    'as' => 'documentacion',
    'uses' => 'DocumentacionController@panelControl'
]);

Route::get('documentacion', [
    'as' => 'documentacion.index',
    'uses' => 'DocumentacionController@index'
]);

Route::get('eliminados', [
    'as' => 'documentacion.eliminados',
    'uses' => 'DocumentacionController@eliminados'
]);

Route::get('buscar', [
    'as' => 'documentacion.buscar',
    'uses' => 'DocumentacionController@buscar'
//    'uses' => 'Ws\SedesController@getSearch'
]);


/*========= Nuevo documento ============*/

Route::get('nuevoDoc', [
    'as' => 'documentacion.nuevo',
    'middleware' => 'permission:crear.documento',
    'uses' => 'DocumentacionController@nuevo'
]);

Route::get('nuevoDoc/{tipo}', [
    'as' => 'documentacion.nuevoDoc',
    'middleware' => 'permission:crear.documento',
    'uses' => 'DocumentacionController@nuevoDoc'
]);

Route::post('postDoc', [
    'as' => 'documentacion.postDoc',
    'middleware' => 'permission:crear.documento',
    'uses' => 'DocumentacionController@postDoc'
]);

/*========================================*/

Route::group(['prefix' => '{id}'], function (){

        Route::get('', [
            'as' => 'documento.editar',
            'middleware' => 'permission:editar.documento',
            'uses' => 'DocumentacionController@showEdit'
        ]);

        Route::put('editarDoc', [
            'as' => 'documentacion.editarDoc',
            'middleware' => 'permission:editar.documento',
            'uses' => 'DocumentacionController@editar'
        ]);

        Route::delete('', [
            'as' => 'documento.eliminar',
            'middleware' => 'permission:eliminar.documento',
            'uses' => 'DocumentacionController@eliminar'
        ]);

        Route::put('', [
            'as' => 'documento.recuperar',
            'middleware' => 'permission:recuperar.documento',
            'uses' => 'DocumentacionController@recuperar'
        ]);

        Route::get('favorito', [
            'as' => 'documento.favorito',
            'middleware' => 'permission:recuperar.documento',
            'uses' => 'DocumentacionController@favorito'
        ]);

        Route::get('visualizar', [
            'as' => 'documento.visualizar',
            'uses' => 'DocumentacionController@visualizar'
        ]);

});

