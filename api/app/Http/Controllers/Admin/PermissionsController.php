<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;

class PermissionsController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getRoles()
    {
        return \Bouncer::role()->all();
    }

    public function getAbilities()
    {
        return \Bouncer::ability()->all();
    }

    public function getUserPermissions(User $user)
    {
        return $user->getAbilities();
    }

    public function getRolePermissions(Role $role)
    {
        return $role->getAbilities();
    }

    public function applyPermissions(Request $request, User $user)
    {
        $this->validate($request, [
            'permissions' => 'nullable|string'
        ]);

        if($request->has('permissions')){

            if(is_null($request->permissions)) {
                $user->abilities()->detach();
            } else {
                $abilities = explode(',', $request->permissions);
                $user->abilities()->sync($abilities);
            }
        }

        return $user->getAbilities();
    }

    public function applyRolePermissions(Request $request, Role $role)
    {
        $this->validate($request, [
            'permissions' => 'nullable|string'
        ]);

        if($request->has('permissions')){

            if(is_null($request->permissions)) {
                $role->abilities()->detach();
            } else {
                $abilities = explode(',', $request->permissions);
                $role->abilities()->sync($abilities);
            }
        }

        return $role->getAbilities();
    }
}