<?php

use Illuminate\Database\Seeder;
use App\Entities\Categoria;

class CategoriasTableSeeder extends Seeder
{

    public function run()
    {
        $datos = [
            ['descripcion' => 'Noticia'],
            ['descripcion' => 'Informacion']
        ];

        Categoria::insert($datos);
    }

}