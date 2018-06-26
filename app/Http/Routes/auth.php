<?php

Route::group(['prefix' => 'auth'], function() {

    Route::get('login', [
        'as' => 'auth.login',
        'uses' => 'AuthController@login'
    ]);

    Route::post('check', [
        'as' => 'auth.check',
        'uses' => 'AuthController@check'
    ]);

});