<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class User extends Authenticatable
{
    use HasRoles;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_student'
    ];

	
	public function setRole($role)
	{
		$role = Role::create(['name' => $role]);
	}
	public function setPermission($permission)
	{
		$permission = Permission::create(['name' => $permission]);
	}
	public function setPermissionToRole($permission,$role){
        $role = Role::where('name',$role)->get();
        $role->givePermissionTo($permission);
    }
    public function removePermissionFromRole($permission,$role){
        $role = Role::where('name',$role)->get();
        $role->revokePermissionTo($permission);
    }
    
	
}
