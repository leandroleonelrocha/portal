<?php

namespace App\Entities;


class CategoriaDocumento extends Entity
{
    protected $table = 'categorias_documentos';

    //Relaciones

    public function documentos()
    {
        return $this->hasMany(Documento::getClass(), 'categoria_id');
    }
}
