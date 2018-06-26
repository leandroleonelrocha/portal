<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepo;
use App\Http\Repositories\RoleRepo;
use App\Http\Repositories\PermisosRepo;
use App\Http\Repositories\NavbarRepo;
use App\Entities\User;

use Bican\Roles\Models\Role;

class UserController extends Controller
{
    protected $userRepo;
    protected $roleRepo;
    protected $permisosRepo;
    protected $navbarRepo;

    public function __construct(UserRepo $userRepo, RoleRepo $roleRepo, PermisosRepo $permisosRepo, NavbarRepo $navbarRepo)
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
        $this->permisosRepo = $permisosRepo;
        $this->navbarRepo = $navbarRepo;
    }

    public function index()
    {
        $navbar = $this->navbarRepo->navbar();
        $users = User::orderBy('username', 'ASC')->paginate(20);
        $this->userRepo->findRole($users);

        return view('users.index', compact('navbar', 'users'));
    }

    public function buscar(Request $request)
    {
        $navbar = $this->navbarRepo->navbar();
        $users = $this->userRepo->buscador($search = $request->usuario);
        $this->userRepo->findRole($users);

        return view('users.index', compact('users', 'navbar'));
    }

    public function changeRole($id)
    {
        $navbar = $this->navbarRepo->navbar();
        $roles = Role::all();
        $user = $this->userRepo->findOrFail($id);
        $this->userRepo->findRole([$user]);

        foreach ($roles as $role){
            $role->checked = ($role->slug == $user->role_slug) ? true : false;
        }
        return view('users.roles')->with(compact('user', 'roles', 'navbar'));
    }

    public function updateRole(Request $request, $id)
    {
        $navbar = $this->navbarRepo->navbar();
        $user = $this->userRepo->findOrFail($id);
        $role = Role::find($request['role']);
        $user->detachAllRoles();
        $user->attachRole($role);
        $users = User::orderBy('username', 'ASC')->paginate(20);
        $this->userRepo->findRole($users);

        return view('users.index')->with('msgOk', 'Se ha cambiado el rol satisfactoriamente.')->with(compact('users', $users, 'navbar' ));
    }

    public function permisos($id)
    {
        $navbar = $this->navbarRepo->navbar();
        $user = $this->userRepo->findOrFail($id);
        $this->userRepo->findRoleUser($user);
        $roles = Role::all();

        foreach ($roles as $r){
            if ($r->slug == $user->role_slug)
                $role = Role::find($r->id);
        }

        $data = $this->roleRepo->ifChecked($role->id, 'user');
        $permisosNoticias = $data['permisosNoticias'];
        $permisosDocumentos = $data['permisosDocumentos'];
        $permisosRoles = $data['permisosRoles'];
        $permisosUsuarios = $data['permisosUsuarios'];

        return view('users.permisos')->with(compact('user', 'role', 'permisosNoticias', 'permisosDocumentos', 'permisosRoles', 'permisosUsuarios', 'navbar'));
    }

    public function asignarPermisos(Request $request, $id)
    {
        $this->permisosRepo->asignar($request, $id);
        $data = $this->roleRepo->ifChecked($id, 'user');
        $data['navbar'] = $this->navbarRepo->navbar();

        $users = User::orderBy('username', 'ASC')->paginate(20);
        $this->userRepo->findRole($users);

        return view('users.index')->with($data)->with('users', $users);
    }

}
