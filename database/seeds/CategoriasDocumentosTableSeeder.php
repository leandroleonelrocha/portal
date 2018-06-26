<?php

use Illuminate\Database\Seeder;
use App\Entities\CategoriaDocumento;

class CategoriasDocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = [
            ['descripcion' => 'Formularios'],
            ['descripcion' => 'Modelos'],
            ['descripcion' => 'Manuales'],
            ['descripcion' => 'Procedimientos'],
            ['descripcion' => 'Estándares tecnológicos'],
            ['descripcion' => 'Resoluciones'],
            ['descripcion' => 'Políticas']
        ];

        CategoriaDocumento::insert($datos);
    }
}
