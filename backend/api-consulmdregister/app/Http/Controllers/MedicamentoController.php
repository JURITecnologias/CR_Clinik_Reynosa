<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    //  Listar todos los medicamentos
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 15);
        $query = Medicamento::query()->whereNull('deleted_at');

        if ($request->has('nombre')) {
            $nombre = $request->get('nombre');
            $query->whereRaw('LOWER(nombre) LIKE ?', ['%' . strtolower($nombre) . '%']);
        }

        return $query->paginate($perPage);
    }

    //  Mostrar un medicamento específico
    public function show($id)
    {
        $medicamento = Medicamento::find($id)->whereNull('deleted_at');

        if (!$medicamento) {
            return response()->json(['error' => 'Medicamento no encontrado'], 404);
        }

        return $medicamento;
    }

    // Crear un nuevo medicamento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_generico' => 'nullable|string|max:255',
            'presentacion' => 'nullable|string|max:255',
            'via_administracion' => 'nullable|string|max:255',
            'concentracion' => 'nullable|string|max:255',
            'unidad' => 'nullable|string|max:50',
            'controlado' => 'boolean',
            'descripcion' => 'nullable|string',
        ]);

        $medicamento = Medicamento::create($validated);

        return response()->json($medicamento, 201);
    }

    //  Actualizar un medicamento existente
    public function update(Request $request, $id)
    {
        $medicamento = Medicamento::find($id);

        if (!$medicamento) {
            return response()->json(['error' => 'Medicamento no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'nombre_generico' => 'nullable|string|max:255',
            'presentacion' => 'nullable|string|max:255',
            'via_administracion' => 'nullable|string|max:255',
            'concentracion' => 'nullable|string|max:255',
            'unidad' => 'nullable|string|max:50',
            'controlado' => 'boolean',
            'descripcion' => 'nullable|string',
        ]);

        $medicamento->update($validated);

        return response()->json($medicamento);
    }

    //  Eliminar (soft delete) un medicamento
    public function destroy($id)
    {
        $medicamento = Medicamento::find($id);

        if (!$medicamento) {
            return response()->json(['error' => 'Medicamento no encontrado'], 404);
        }

        $medicamento->delete();

        return response()->json(['message' => 'Medicamento eliminado']);
    }
}