<?php

require (__DIR__ . '/Routes/auth.php');

Route::group(['middleware' => 'auth'], function() {

    Route::get('', 'DashboardController@index');

    require (__DIR__ . '/Routes/dashboard.php');

//    require (__DIR__ . '/Routes/noticias.php');

    require (__DIR__ . '/Routes/webservice.php');

    require (__DIR__ . '/Routes/multimedia.php');

    require (__DIR__ . '/Routes/sistemas.php');

    require (__DIR__ . '/Routes/protocolo.php');

    Route::group(['middleware' => 'role:admin'], function () {

        require (__DIR__ . '/Routes/noticias.php');

        require(__DIR__ . '/Routes/navbar.php');

        require(__DIR__ . '/Routes/rolesypermisos.php');

        require(__DIR__ . '/Routes/users.php');

        require (__DIR__ . '/Routes/documentacion.php');

    });

});

