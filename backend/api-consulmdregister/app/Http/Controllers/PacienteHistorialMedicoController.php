<?php

namespace App\Http\Controllers;

use App\Models\PacienteHistorialMedico;
use Illuminate\Http\Request;

class PacienteHistorialMedicoController extends Controller
{
    // Listar todos los historiales médicos
    public function index()
    {
        return response()->json(PacienteHistorialMedico::with('paciente')->get());
    }

    // Mostrar un historial médico específico
    public function show($id)
    {
        $historial = PacienteHistorialMedico::with('paciente')->find($id);

        if (!$historial) {
            return response()->json(['mensaje' => 'Historial médico no encontrado'], 404);
        }

        return response()->json($historial);
    }

    // Crear un nuevo historial médico (puedes agregar validación si lo necesitas)
    public function store(Request $request)
    {
        $historial = PacienteHistorialMedico::create($request->all());

        return response()->json($historial, 201);
    }

    // Actualizar un historial médico
    public function update(Request $request, $id)
    {
        $historial = PacienteHistorialMedico::find($id);

        if (!$historial) {
            return response()->json(['mensaje' => 'Historial médico no encontrado'], 404);
        }

        $historial->update($request->all());

        return response()->json($historial);
    }

    // Eliminar (soft delete) un historial médico
    public function destroy($id)
    {
        $historial = PacienteHistorialMedico::find($id);

        if (!$historial) {
            return response()->json(['mensaje' => 'Historial médico no encontrado'], 404);
        }

        $historial->delete();

        return response()->json(['mensaje' => 'Historial médico eliminado']);
    }

    // Buscar historiales médicos por varios campos
    public function buscar(Request $request)
    {
        $query = PacienteHistorialMedico::query();

        if ($request->filled('nombre_completo')) {
            $query->where('nombre_completo', 'LIKE', '%' . $request->nombre_completo . '%');
        }

        if ($request->filled('paciente_id')) {
            $query->where('paciente_id', $request->paciente_id);
        }

        if ($request->filled('fecha_nacimiento')) {
            $query->where('fecha_nacimiento', $request->fecha_nacimiento);
        }

        // Agrega más filtros según tus necesidades...

        $resultados = $query->with('paciente')->get();

        if ($resultados->isEmpty()) {
            return response()->json(['mensaje' => 'Historial médico no encontrado'], 404);
        }

        return response()->json($resultados);
    }
}