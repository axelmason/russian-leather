<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    public function changeRolePermission(Request $request, $roleId)
    {
        $role = Role::find($roleId);

        $permissionIds = array_keys($request->except('_token'));

        $role->permissions()->syncWithoutDetach($permissionIds);
    }

    public function get()
    {
        return response()->json(['roles' => Role::all()]);
    }

    public function getOne($roleId)
    {
        $role = Role::with('permissions')->where('id', $roleId)->first();
        return response()->json(['role' => $role]);
    }

    public function changePermissions(Request $r, $roleId)
    {
        $role = Role::find($roleId);

        $change = $role->permissions()->sync($r->all());

        return response()->json(['changed' => $change]);
    }
}
