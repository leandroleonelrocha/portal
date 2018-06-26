<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\RoleRepo;
use App\Http\Repositories\PermisosRepo;
use App\Http\Repositories\NavbarRepo;

class PermissionsController extends Controller
{

    protected $roleRepo;
    protected $permisosRepo;
    protected $navbaRepo;

    public function __construct(RoleRepo $roleRepo, PermisosRepo $permisosRepo, NavbarRepo $navbarRepo)
    {
        $this->roleRepo = $roleRepo;
        $this->permisosRepo = $permisosRepo;
        $this->navbaRepo = $navbarRepo;
    }

    public function asignar(Request $request, $id)
    {
        $data['navbar'] = $this->navbaRepo->navbar();
        $this->permisosRepo->asignar($request, $id);
        $data = $this->roleRepo->ifChecked($id, 'role');

        // Compruebo si no tiene ningún permiso asignado
        $permissions = array_merge($data['permisosNoticias'],
                            $data['permisosDocumentos'],
                            $data['permisosRoles'],
                            $data['permisosUsuarios'],
                            $data['permisosNavbar']);
        $data['hasPermissions'] = $this->roleRepo->hasAnyPermission($permissions);

        return view('roles.permisos')->with($data);
    }

}
