<?php

Route::group(['prefix' => 'auth'], function() {

    Route::get('login', [
        'as' => 'auth.login',
        'uses' => 'AuthController@login'
    ]);

    Route::get('check', [
        'as' => 'auth.check',
        'uses' => 'AuthController@check'
    ]);

});