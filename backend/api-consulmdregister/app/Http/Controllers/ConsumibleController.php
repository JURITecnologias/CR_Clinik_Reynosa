<?php

namespace App\Http\Controllers;

use App\Models\Consumible;
use App\Models\CategoriaConsumible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsumibleController extends Controller
{
    // Listar consumibles con paginación y filtro opcional por categoría
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 15);
        $query = Consumible::with('categoria');
        
        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->query('categoria_id'));
        }
        
        if ($request->has('search')) {
            $search = $request->query('search');
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('codigo_interno', 'like', "%$search%")
                  ->orWhere('descripcion', 'like', "%$search%");
            });
        }

        if ($request->has('activo')) {
            $activo = filter_var($request->query('activo'), FILTER_VALIDATE_BOOLEAN);
            $query->where('es_activo', $activo);
        }

        return $query->orderBy('nombre')->paginate($perPage);
    }

    // Crear un nuevo consumible
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo_interno' => 'required|string|unique:consumibles',
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'required|string',
            'stock_actual' => 'nullable|integer',
            'stock_minimo' => 'nullable|integer',
            'categoria_id' => 'nullable|exists:categoria_consumibles,id',
            'es_activo' => 'boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data= $validator->validated();
        $data['uuid'] = \Illuminate\Support\Str::uuid()->toString();
        $data['stock_actual'] = $data['stock_actual'] ?? 0;
        $data['stock_minimo'] = $data['stock_minimo'] ?? 0;
        $data['precio_unitario_promedio'] = $data['precio_unitario_promedio'] ?? 0;
        $data['costo_unitario_promedio'] = $data['costo_unitario_promedio'] ?? 0;
        $data['es_activo'] = $data['es_activo'] ?? false;

        $consumible = Consumible::create($data);
        return response()->json($consumible->load('categoria'), 201);
    }

    // Mostrar un consumible específico
    public function show($id)
    {
        $consumible = Consumible::with('categoria')->findOrFail($id);
        return response()->json($consumible);
    }

    // Actualizar un consumible
    public function update(Request $request, $id)
    {
        $consumible = Consumible::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'codigo_interno' => 'sometimes|required|string|unique:consumibles,codigo_interno,' . $id,
            'nombre' => 'sometimes|required|string',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'sometimes|required|string',
            'stock_actual' => 'nullable|integer',
            'stock_minimo' => 'nullable|integer',
            'precio_unitario_promedio' => 'sometimes|required|numeric',
            'costo_unitario_promedio' => 'sometimes|required|numeric',
            'es_activo' => 'boolean',
            'categoria_id' => 'nullable|exists:categoria_consumibles,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $consumible->update($validator->validated());
        return response()->json($consumible->load('categoria'));
    }

    // Eliminar (soft delete) un consumible
    public function destroy($id)
    {
        $consumible = Consumible::findOrFail($id);
        $consumible->delete();
        return response()->json(['message' => 'Consumible eliminado']);
    }
}
