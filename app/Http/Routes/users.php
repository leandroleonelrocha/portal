<?php

Route::get('users', [
    'as' => 'users.index',
    'uses' => 'UserController@index'
]);

Route::post('users/buscar', [
    'as' => 'users.buscar',
    'uses' => 'UserController@buscar'
]);

Route::get('users/role/{id}', [
    'as' => 'users.changeRol',
    'middleware' => 'permission:cambiar.rol.usuario',
    'uses' => 'UserController@changeRole'
]);

Route::post('users/update/{id}', [
    'as' => 'users.updateRole',
    'middleware' => 'permission:cambiar.rol.usuario',
    'uses' => 'UserController@updateRole'
]);

Route::get('users/permisos/{id}', [
    'as' => 'users.permisos',
    'uses' => 'UserController@permisos'
]);

Route::post('users/permisos/asignar/{id}', [
    'as' => 'users.asignarPermisos',
    'middleware' => 'permission:asignar.permiso.usuario',
    'uses' => 'UserController@asignarPermisos'
]);