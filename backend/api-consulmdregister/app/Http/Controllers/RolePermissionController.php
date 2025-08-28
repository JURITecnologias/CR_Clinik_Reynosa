<?php

// app/Http/Controllers/RolePermissionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permissions;

class RolePermissionController extends Controller
{
    // Asignar uno o varios permisos a un rol
    public function assignPermissions(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        $permissionIds = Permissions::whereIn('name', $request->permissions)->pluck('id');

        $role->permissions()->syncWithoutDetaching($permissionIds);

        return response()->json([
            'message' => 'Permisos asignados correctamente',
            'role' => $role->name,
            'permissions' => $role->permissions()->pluck('name')
        ]);
    }

    // Quitar uno o varios permisos de un rol
    public function revokePermissions(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        $permissionIds = Permissions::whereIn('name', $request->permissions)->pluck('id');

        $role->permissions()->detach($permissionIds);

        return response()->json([
            'message' => 'Permisos revocados correctamente',
            'role' => $role->name,
            'permissions' => $role->permissions()->pluck('name')
        ]);
    }

    // Ver permisos actuales de un rol
    public function showPermissions($roleId)
    {
        $role = Role::with('permissions')->findOrFail($roleId);

        return response()->json([
            'role' => $role->name,
            'permissions' => $role->permissions->pluck('name')
        ]);
    }
}