<?php

Route::get('protocolo', [
    'as' => 'protocolo.index',
    'uses' => 'ProtocoloController@index'
]);

Route::get('protocolo/buscar/area/{id}', [
        'as' => 'protocolo.datosArea',
        'uses' => 'ProtocoloController@datosArea'
    ]);

Route::post('protocolo/buscar/area', [
    'as' => 'protocolo.buscarArea',
    'uses' => 'ProtocoloController@buscarArea'
]);


Route::post('protocolo/buscar/responsable', [
    'as' => 'protocolo.buscarResponsable',
    'uses' => 'ProtocoloController@buscarResponsable'
]);


Route::get('protocolo/sedes/{id}', [
    'as' => 'protocolo.searchSede',
    'uses' => 'Ws\SedesController@getSearch'
]);

Route::get('protocolo/sedes/{id}/show', [
    'as' => 'protocolo.showSede',
    'uses' => 'ProtocoloController@showSede'
]);