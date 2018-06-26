<?php

Route::get('dashboard/index', [
    'as' => 'dashboard.index',
    'uses' => 'DashboardController@index'
]);

Route::get('dashboard/noticias', [
    'as' => 'dashboard.noticias',
    'uses' => 'DashboardController@noticias'
]);