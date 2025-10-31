<?php

namespace App\Http\Controllers;

use App\Models\CategoriaConsumible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaConsumibleController extends Controller
{
    // Listar categorías con paginación y búsqueda
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 15);
        $query = CategoriaConsumible::query();
        if ($request->has('search')) {
            $search = $request->query('search');
            $query->where('nombre', 'like', "%$search%")
                  ->orWhere('descripcion', 'like', "%$search%") ;
        }
        return $query->orderBy('nombre')->paginate($perPage);
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:categoria_consumibles',
            'descripcion' => 'nullable|string',
            'es_activo' => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        $data['uuid'] = \Illuminate\Support\Str::uuid()->toString();
        $data['es_activo'] = $data['es_activo'] ?? true;
        $categoria = CategoriaConsumible::create($data);
        return response()->json($categoria, 201);
    }

    // Mostrar una categoría específica
    public function show($id)
    {
        $categoria = CategoriaConsumible::with('consumibles')->findOrFail($id);
        return response()->json($categoria);
    }

    // Actualizar una categoría
    public function update(Request $request, $id)
    {
        $categoria = CategoriaConsumible::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|unique:categoria_consumibles,nombre,' . $id,
            'descripcion' => 'nullable|string',
            'es_activo' => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $categoria->update($validator->validated());
        return response()->json($categoria);
    }

    // Eliminar (soft delete) una categoría
    public function destroy($id)
    {
        $categoria = CategoriaConsumible::findOrFail($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoría eliminada']);
    }
}
