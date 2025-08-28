<?php

// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    protected $protectedRoles = ['Admon', 'Main Admin'];

    public function index()
    {
        return response()->json(Role::all());
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name'
        ]);

        $role = Role::create(['name' => $request->name]);

        return response()->json([
            'message' => 'Rol creado correctamente',
            'role' => $role
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        if (in_array($role->name, $this->protectedRoles)) {
            return response()->json([
                'error' => 'No se puede modificar el rol protegido: ' . $role->name
            ], 403);
        }

        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id
        ]);

        $role->update(['name' => $request->name]);

        return response()->json([
            'message' => 'Rol actualizado correctamente',
            'role' => $role
        ]);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if (in_array($role->name, $this->protectedRoles)) {
            return response()->json([
                'error' => 'No se puede eliminar el rol protegido: ' . $role->name
            ], 403);
        }

        $role->delete();

        return response()->json([
            'message' => 'Rol eliminado correctamente',
            'deleted_role' => $role->name
        ]);
    }
}