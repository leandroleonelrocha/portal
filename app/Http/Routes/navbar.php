<?php



    Route::get('navbar', [
        'as' => 'navbar.index',
        'uses' => 'NavbarController@index'
    ]);

    Route::post('', [
        'as' => 'navbar.change',
        'uses' => 'NavbarController@change'
    ]);

    Route::get('description', [
        'as' => 'navbar.description',
        'uses' => 'NavbarController@changeDescription'
    ]);

    Route::delete('', [
        'as' => 'navbar.destroy',
        'uses' => 'NavbarController@destroy'
    ]);






