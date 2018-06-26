<?php

namespace App\Entities;


class Categoria extends Entity
{

    //Relaciones

    public function noticia()
    {
        return $this->hasMany(Noticia::getClass());
    }
}
