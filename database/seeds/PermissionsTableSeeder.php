<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = [
            [
                'name' => 'Listar noticias',
                'slug' => 'listar.noticias',
                'description' => 'Acceder al listado completo de noticias publicadas',
                'model' => 'noticia'
            ],
            [
                'name' => 'Crear noticia',
                'slug' => 'crear.noticia',
                'description' => 'Redactar y publicar noticias',
                'model' => 'noticia'
            ],
            [
                'name' => 'Editar noticia',
                'slug' => 'editar.noticia',
                'description' => 'Editar noticias publicadas',
                'model' => 'noticia'
            ],
            [
                'name' => 'Eliminar noticia',
                'slug' => 'eliminar.noticia',
                'description' => 'Eliminar noticias publicadas',
                'model' => 'noticia'
            ],
            [
                'name' => 'Recuperar noticia',
                'slug' => 'recuperar.noticia',
                'description' => 'Recuperar noticias eliminadas',
                'model' => 'noticia'
            ],
            [
                'name' => 'Crear documento',
                'slug' => 'crear.documento',
                'description' => 'Publicar documentos nuevos',
                'model' => 'documento'
            ],
            [
                'name' => 'Marcar favorito',
                'slug' => 'marcar.favorito',
                'description' => 'Marcar documento como favorito',
                'model' => 'documento'
            ],
            [
                'name' => 'Editar documento',
                'slug' => 'editar.documento',
                'description' => 'Editar los docuementos publicados',
                'model' => 'documento'
            ],
            [
                'name' => 'Eliminar documento',
                'slug' => 'eliminar.documento',
                'description' => 'Eliminar documentos publicados',
                'model' => 'documento'
            ],
            [
                'name' => 'Recuperar documento',
                'slug' => 'recuperar.documento',
                'description' => 'Recuperar documentos eliminados',
                'model' => 'documento'
            ],
            [
                'name' => 'Cambiar rol usuario',
                'slug' => 'cambiar.rol.usuario',
                'description' => 'Cambiar el rol de un usuario por otro',
                'model' => 'usuario'
            ],
            [
                'name' => 'Asignar permiso usuario',
                'slug' => 'asignar.permiso.usuario',
                'description' => 'Asignar diferentes permisos a un usuario determinado',
                'model' => 'usuario'
            ],
            [
                'name' => 'Quitar permisos usuario',
                'slug' => 'quitar.permisos.usuario',
                'description' => 'Quitar diferentes permisos a un usuario determinado',
                'model' => 'usuario'
            ],
            [
                'name' => 'Agregar rol',
                'slug' => 'agregar.rol',
                'description' => 'Agregar un nuevo rol a la lista de roles disponibles',
                'model' => 'role'
            ],
            [
                'name' => 'Editar rol',
                'slug' => 'editar.rol',
                'description' => 'Editar propiedades (nombre, descripción, nivel) de un rol determinado.',
                'model' => 'role'
            ],
            [
                'name' => 'Eliminar rol',
                'slug' => 'eliminar.rol',
                'description' => 'Eliminar un rol determinado',
                'model' => 'role'
            ],
            [
                'name' => 'Asignar permisos rol',
                'slug' => 'asignar.permisos.rol',
                'description' => 'Asignar diferentes permisos a un rol determinado',
                'model' => 'role'
            ],
            [
                'name' => 'Quitar permisos rol',
                'slug' => 'quitar.permisos.rol',
                'description' => 'Quitar diferentes permisos a un rol determinado',
                'model' => 'role'
            ]
        ];

        Permission::insert($datos);

    }
}
