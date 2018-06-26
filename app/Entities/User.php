<?php namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    HasRoleAndPermissionContract
{
    use Authenticatable, Authorizable, HasRoleAndPermission;

    protected $roleName = '(sin rol asignado)';
    protected $roleSlug = '';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'fullname', 'imagen', 'imagen_thumb'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function getRoleNameAttribute()
{
    return $this->roleName;
}

    public function setRoleName($roleName)
    {
        return $this->roleName = $roleName;
    }

    public function getRoleSlugAttribute()
    {
        return $this->roleSlug;
    }

    public function setRoleSlug($roleSlug)
    {
        return $this->roleSlug = $roleSlug;
    }
}
