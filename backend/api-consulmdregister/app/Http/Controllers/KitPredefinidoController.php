<?php

namespace App\Http\Controllers;

use App\Models\KitPredefinido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KitPredefinidoController extends Controller
{
    // Listar kits con paginación y búsqueda
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 15);
        $query = KitPredefinido::with('consumibles');
        if ($request->has('search')) {
            $search = $request->query('search');
            $query->where('nombre', 'like', "%$search%")
                  ->orWhere('descripcion', 'like', "%$search%") ;
        }

        if ($request->has('activo')) {
            $activo = $request->query('activo') === 'true' || $request->query('activo') === true;
            $query->where('es_activo', $activo);
        }

        return $query->orderBy('nombre')->paginate($perPage);
    }

    // Crear un nuevo kit
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:kits_predefinidos',
            'descripcion' => 'nullable|string',
            'es_activo' => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        $data['uuid'] = \Illuminate\Support\Str::uuid()->toString();
        $data['es_activo'] = $data['es_activo'] ?? true;
        $kit = KitPredefinido::create($data);
        return response()->json($kit, 201);
    }

    // Mostrar un kit específico
    public function show($id)
    {
        $kit = KitPredefinido::with('consumibles')->findOrFail($id);
        return response()->json($kit);
    }

    // Actualizar un kit
    public function update(Request $request, $id)
    {
        $kit = KitPredefinido::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|unique:kits_predefinidos,nombre,' . $id,
            'descripcion' => 'nullable|string',
            'es_activo' => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $kit->update($validator->validated());
        return response()->json($kit);
    }

    // Eliminar (soft delete) un kit
    public function destroy($id)
    {
        $kit = KitPredefinido::findOrFail($id);
        $kit->delete();
        return response()->json(['message' => 'Kit eliminado']);
    }
}
