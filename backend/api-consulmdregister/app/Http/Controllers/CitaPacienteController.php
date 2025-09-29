<?php

namespace App\Http\Controllers;

use App\Models\CitaPaciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitaPacienteController extends Controller
{
    // Listar todas las citas
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 15); 
        $query = CitaPaciente::with(['paciente', 'doctor', 'consulta']);
        
        if ($request->filled('direccion')) {
            $query->orderBy('fecha_cita', $request->direccion);
        } else {
            $query->orderBy('created_at', 'desc');
        }
       
        return $query->paginate($perPage);
    }

    // Mostrar una cita específica
    public function show($id)
    {
        $cita = CitaPaciente::with(['paciente', 'doctor', 'consulta'])->find($id);
        if (!$cita) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }
        return response()->json($cita);
    }

    // Crear una nueva cita
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'paciente_id'   => 'required|exists:pacientes,id',
            'doctor_id'     => 'nullable|exists:informacion_doctor,id',
            'consulta_id'   => 'nullable|exists:consultas,id',
            'fecha_cita'    => 'required|date',
            'hora_cita'     => 'required',
            'atendio_cita'  => 'nullable|boolean',
            'notas'         => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $cita = CitaPaciente::create($validator->validated());
        return response()->json($cita, 201);
    }

    // Actualizar una cita existente
    public function update(Request $request, $id)
    {
        $cita = CitaPaciente::find($id);
        if (!$cita) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'paciente_id'   => 'sometimes|required|exists:pacientes,id',
            'doctor_id'     => 'nullable|exists:informacion_doctor,id',
            'consulta_id'   => 'nullable|exists:consultas,id',
            'fecha_cita'    => 'sometimes|required|date',
            'hora_cita'     => 'sometimes|required',
            'atendio_cita'  => 'nullable|boolean',
            'notas'         => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $cita->update($validator->validated());
        return response()->json($cita);
    }

    // Eliminar (soft delete) una cita
    public function destroy($id)
    {
        $cita = CitaPaciente::find($id);
        if (!$cita) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }
        $cita->delete();
        return response()->json(['message' => 'Cita eliminada']);
    }

    // Buscar citas por paciente, doctor o fecha
    public function buscar(Request $request)
    {
        $query = CitaPaciente::with(['paciente', 'doctor', 'consulta']);
        if ($request->filled('paciente_id')) {
            $query->where('paciente_id', $request->paciente_id);
        }
        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }
        if ($request->filled('fecha_cita')) {
            $query->whereDate('fecha_cita', $request->fecha_cita);
        }
        if($request->filled('consulta_id')) {
            $query->where('consulta_id', $request->consulta_id);
        }

        if($request->filled('direccion')) {
            $query->orderBy('fecha_cita', $request->direccion);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        if ($request->filled('nombre_paciente')) {
            $nombre = strtolower($request->get('nombre_paciente'));
            $query->whereHas('paciente', function($q) use ($nombre) {
                $q->whereRaw("LOWER(CONCAT(nombre, ' ', apellido)) LIKE ?", ['%' . $nombre . '%']);
            });
        }
        $perPage = $request->get('per_page', 15);
        return $query->paginate($perPage);
    }
}
