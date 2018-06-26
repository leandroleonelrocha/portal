<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Repositories\DocumentoRepo;
use Bican\Roles\Models\Role;
use App\Http\Repositories\RoleRepo;
use App\Http\Repositories\NavbarRepo;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    protected $documentoRepo;
    protected $roleRepo;
    protected $navbarRepo;

    public function __construct(DocumentoRepo $documentoRepo, RoleRepo $roleRepo, NavbarRepo $navbarRepo)
    {
        $this->documentoRepo = $documentoRepo;
        $this->roleRepo = $roleRepo;
        $this->navbarRepo = $navbarRepo;
    }

    public function index()
    {
        $data['navbar'] = $this->navbarRepo->navbar();
        $data['roles'] = DB::table('roles')->orderBy('name')->get();

        return view('roles.index')->with($data);
    }


    public function store(CreateRoleRequest $request)
    {
        $request['level'] = ($request['level'] != '') ? $request['level'] : 1;

        Role::create([
            'name' => $request['name'],
            'slug' => $request['name'],
            'description' => $request['description'],
            'level' => $request['level'],
        ]);

        return redirect()->route('roles.index')
            ->with('msgOk', 'Rol creado con éxito. El rol aún no tiene nigún permiso. Haga click para asignarlos.');

    }


    public function update(CreateRoleRequest $request, $id)
    {
        $role = Role::find($id);

        $role->name = $request['name'];
        $role->description = $request['description'];
        $role->level = $request['level'];

        $role->save();

        return redirect()->route('roles.index');
    }


    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role->slug == 'admin')
            return redirect()->route('roles.index')->withErrors('¡Lo sentimos! No está permitido eliminar el rol "Admin".');

        $role->delete();

        return  redirect()->route('roles.index');
    }

    public function permisos($id)
    {
        $data = $this->roleRepo->ifChecked($id, 'role');

        // Compruebo si no tiene ningún permiso asignado
        $permissions = array_merge($data['permisosNoticias'],
                    $data['permisosDocumentos'],
                    $data['permisosRoles'],
                    $data['permisosUsuarios']);

        $data['hasPermissions'] = $this->roleRepo->hasAnyPermission($permissions);
        $data['navbar'] = $this->navbarRepo->navbar();

        return view('roles.permisos')->with($data);
    }

}
