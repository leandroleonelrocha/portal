<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentosTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('documentos')->insert([
            'descripcion' => 'Solicitud de insumos y repuestos',
            'codigo' => 'IN006',
            'area_id' => '4',
            'area_nombre' => 'Dirección de Servicios Digitales, Informáticos y de Telecomunicaciones',
            'categoria_id' => '1',
            'file_path' => 'https://portal.mds.gob.ar',
            'file_name' => 'insumos-y-repuestos.pdf',
            'file_type' => 'application/pdf',
            'url' => 'http://nuevo-portal.mds.gob.ar/storage/insumos-y-repuestos.pdf',
            'lecturas' => '12'
        ]);

        DB::table('documentos')->insert([
            'descripcion' => 'Solicitud de artículos de librería / útiles',
            'codigo' => 'PA001',
            'area_id' => '13',
            'area_nombre' => 'Departamento de Patrimonio',
            'categoria_id' => '1',
            'file_path' => '',
            'file_name' => '',
            'file_type' => 'link',
            'url' => 'http://formularios.mds.gob.ar/patrimonio/libreria',
            'lecturas' => '5'
        ]);

//        DB::table('documentos')->insert([
//            'descripcion' => '',
//            'codigo' => '',
//            'area_id' => '',
//            'area_nombre' => '',
//            'categoria_id' => '',
//            'file_path' => '',
//            'file_name' => '',
//            'file_type' => '',
//            'url' => '',
//            'lecturas' => ''
//        ]);

    }

}