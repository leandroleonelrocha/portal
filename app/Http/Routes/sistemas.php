<?php

Route::get('sistemas', [
    'as' => 'sistemas.index',
    'uses' => 'SistemasController@index'
]);