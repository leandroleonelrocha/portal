<?php namespace App\Http\Repositories;

use Bican\Roles\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleRepo extends BaseRepo
{
    public function getModel()
    {
        return new Role();
    }

    public function ifChecked($id, $idType)
    {
        $data['role'] = DB::table('roles')->where('id', $id)->first();
        $data['permisos'] = DB::table('permission_role')->where('role_id', $id)->get();

        // Establece los permisos de rol que no se pueden modificar
        foreach ($data['permisos'] as $permiso){
            $permiso->disabled = 'disabled';
        }

        // A los permisos del rol le agrega los permisos extra que pueda tener el usuario
        if($idType == 'user') {
            $permisosUser = DB::table('permission_user')->where('user_id', $id)->get();

            // Establece los permisos extra de usuario que son modificables
            foreach ($permisosUser as $permisoUser){
                $permisoUser->disabled = null;
            }
            $data['permisos'] = array_merge($data['permisos'], $permisosUser);
        }

        $data['permisosNoticias'] = DB::table('permissions')->where('model', 'noticia')->get();
        $data['permisosDocumentos'] = DB::table('permissions')->where('model', 'documento')->get();
        $data['permisosRoles'] = DB::table('permissions')->where('model', 'role')->get();
        $data['permisosUsuarios'] = DB::table('permissions')->where('model', 'usuario')->get();
        $data['permisosNavbar'] = DB::table('permissions')->where('model', 'navbar')->get();

        $data['permisosNoticias'] = $this->setChecked($data['permisosNoticias'], $data['permisos']);
        $data['permisosDocumentos'] = $this->setChecked($data['permisosDocumentos'], $data['permisos']);
        $data['permisosRoles'] = $this->setChecked($data['permisosRoles'], $data['permisos']);
        $data['permisosUsuarios'] = $this->setChecked($data['permisosUsuarios'], $data['permisos']);
        $data['permisosNavbar'] = $this->setChecked($data['permisosNavbar'], $data['permisos']);


        return $data;

    }

    protected function setChecked($permisos, $permisosAsignados)
    {

        foreach ($permisos as $permiso) {

            $permiso->checked = false;
            $permiso->disabled = null;

            foreach ($permisosAsignados as $asignado) {
                if ($asignado->permission_id == $permiso->id) {
                    $permiso->checked = true;
                    $permiso->disabled = $asignado->disabled;
                }
            }
        }


        return $permisos;
    }

    public function hasAnyPermission($data)
    {
        foreach ($data as $permiso) {

            if ($permiso->checked == true){
                $hasPermissions = true;
                break;
            } else {
                $hasPermissions = false;
            }
        }
        return $hasPermissions;
    }

}
