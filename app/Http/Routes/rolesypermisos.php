<?php

Route::group(['prefix' => 'roles'], function() {

    Route::get('{id?}', [
        'as' => 'roles.index',
        'uses' => 'RolesController@index'
    ]);

    Route::post('', [
        'as' => 'roles.nuevo',
        'middleware' => 'permission:agregar.rol',
        'uses' => 'RolesController@store'
    ]);

    Route::delete('eliminar/{id}', [
        'as' => 'roles.eliminar',
        'middleware' => 'permission:eliminar.rol',
        'uses' => 'RolesController@destroy'
    ]);

    Route::get('editar/{id}', [
        'as' => 'roles.editar',
        'middleware' => 'permission:editar.rol',
        'uses' => 'RolesController@edit'
    ]);

    Route::post('editar/{id}', [
        'as' => 'roles.editar',
        'middleware' => 'permission:editar.rol',
        'uses' => 'RolesController@update'
    ]);

    Route::get('roles/permisos/{id}', [
        'as' => 'roles.permisos',
        'uses' => 'RolesController@permisos'
    ]);

});

Route::group(['prefix' => 'permisos'], function() {

    Route::post('permisos/asignar/{id}', [
        'as' => 'permisos.asignar',
        'middleware' => 'permission:asignar.permisos.rol',
        'uses' => 'PermissionsController@asignar'
    ]);

});
