<?php

namespace App\Entities;


class Navbar extends Entity
{

    protected $table = 'navbar';
    protected $fillable = ['nombre', 'ruta', 'direccion', 'orden', 'habilitado'];

    public $rutaIncorrecta = false;

}
