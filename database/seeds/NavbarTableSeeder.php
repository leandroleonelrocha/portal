<?php

use Illuminate\Database\Seeder;
use App\Entities\Navbar;

class NavbarTableSeeder extends Seeder
{

    public function run()
    {

        $datos = [
            [
                'nombre' => 'Inicio',
                'ruta' => 'dashboard.index',
                'direccion' => 'dashboard/index',
                'orden' => '1',
                'habilitado' => '1'
            ],
            [
                'nombre' => 'Protocolo telefónico',
                'ruta' => 'protocolo.index',
                'direccion' => 'protocolo',
                'orden' => '2',
                'habilitado' => '1'
            ],
            [
                'nombre' => 'Documentación',
                'ruta' => 'documentacion.index',
                'direccion' => 'documentacion',
                'orden' => '3',
                'habilitado' => '1'
            ],
            [
                'nombre' => 'Sistemas',
                'ruta' => 'sistemas.index',
                'direccion' => 'sistemas',
                'orden' => '4',
                'habilitado' => '1'
            ]
        ];

        Navbar::insert($datos);

    }

}