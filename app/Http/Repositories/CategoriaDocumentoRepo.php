<?php namespace App\Http\Repositories;

use App\Entities\CategoriaDocumento;

class CategoriaDocumentoRepo extends BaseRepo
{
    public function getModel()
    {
        return new CategoriaDocumento;
    }

    public function listAll()
    {
        return $this->model
            ->orderBy('descripcion')
            ->lists('descripcion', 'id');
    }

}