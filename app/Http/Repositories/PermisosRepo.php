<?php namespace App\Http\Repositories;

use App\Entities\User;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;


class PermisosRepo extends BaseRepo
{
    public function getModel()
    {
        return new Permission();
    }

    public function asignar($request, $id)
    {
        $object = ($request['user']) ? User::find($id) : Role::find($id);
        $object->detachAllPermissions();

        if ($request->has('permisos'))
            $object->attachPermission($request->permisos);

        return $object;
    }

}