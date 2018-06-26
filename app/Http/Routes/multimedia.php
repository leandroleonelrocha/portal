<?php

Route::get('imagen/get/{id}', [
    'as' => 'getentry',
    'uses' => 'MultimediaController@get'
]);

Route::group(['prefix' => 'multimedia'], function() {

    Route::get('', [
        'as' => 'multimedia.index',
        'uses' => 'MultimediaController@index'
    ]);

    Route::post('', [
        'as' => 'multimedia.create',
        'uses' => 'MultimediaController@store'
    ]);

    Route::group(['prefix' => '{id}'], function() {

        Route::get('', [
            'as' => 'multimedia.show',
            'uses' => 'MultimediaController@show'
        ]);

    });

});

