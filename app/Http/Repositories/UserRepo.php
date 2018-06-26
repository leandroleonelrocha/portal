<?php namespace App\Http\Repositories;

use App\Entities\User;
use Illuminate\Support\Facades\DB;

class UserRepo extends BaseRepo
{
    public function getModel()
    {
        return new User;
    }


    public function searchByUsername($username)
    {
        return $this->model
            ->where('username', $username)
            ->first();
    }

     public function searchByEmail($email)
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }

    public function buscador($search = null , $paginate = 20)
    {
        $users = $this->model
            ->orderBy('users.username', 'ASC');

        if(!is_null($search) && $search != ''){

            $users->where(function ($qry) use ($search) {
                $qry->where('fullname', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });

        };

        return $users->paginate($paginate);
    }


    public function findRole($users)
    {
        $roles = $this->relationRolesUsers();

        foreach ($users as $user) {
            $this->setRolesProperties($roles, $user);
        }

        return $users;
    }


    public function findRoleUser($user)
    {
        $roles = $this->relationRolesUsers();
        $this->setRolesProperties($roles, $user);

        return $user;
    }


    protected function relationRolesUsers()
    {
        return DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.*', 'role_user.*')
            ->get();
    }


    protected  function setRolesProperties($roles, $user)
    {
        foreach ($roles as $role) {
            if ($user->id == $role->user_id) {
                $user->setRoleName($role->name);
                $user->setRoleSlug($role->slug);
            }
        }
    }

}