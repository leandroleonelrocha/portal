<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        $datos = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrador general del sitio',
                'level' => '1'
            ],
            [
                'name' => 'Usuario',
                'slug' => 'usuario',
                'description' => 'Usuario común con permisos de lectura',
                'level' => '1'
            ],
            [
                'name' => 'Administrador de noticias',
                'slug' => 'administrador.noticias',
                'description' => 'Encargado de administrar las noticias publicadas',
                'level' => '1'
            ]
        ];

        Role::insert($datos);

        $permisos = Permission::lists('id')->toArray();
        $role = Role::find(1);
        $role->permissions()->attach($permisos);

    }
}
