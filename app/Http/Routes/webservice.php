<?php

Route::group(['prefix' => 'ws', 'namespace' => 'Ws'], function() {

    Route::controller('noticias', 'NoticiasController');

    Route::controller('areas', 'AreasController');

    Route::get('noticias/like', 'NoticiasController@getLikes');

    //Route::get('documentacion/favorito', 'DocumentacionController@getFavoritos');

});