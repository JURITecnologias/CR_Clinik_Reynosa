<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\HorarioDoctor;
use App\Models\SignosVitales;
use App\Models\Paciente;
use App\Models\InformacionDoctor;
use Carbon\Carbon;

use function Psy\debug;

class ConsultasController extends Controller
{
    // Listar todas las consultas activas
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10); // Número de elementos por página, por defecto 10
        return Consulta::with(['paciente', 'doctor', 'signosVitales'])->paginate($perPage);
    }

    // Buscar consultas con opción de paginado utilizando query string
    public function search(Request $request)
    {
        $query = Consulta::query();

        $filters = $request->query();

        if (!empty($filters['paciente_nombre'])) {
            $query->whereHas('paciente', function ($q) use ($filters) {
                $q->where('nombre', 'like', '%' . $filters['paciente_nombre'] . '%');
            });
        }

        if (!empty($filters['doctor_nombre'])) {
            $query->whereHas('doctor', function ($q) use ($filters) {
                $q->where('nombre', 'like', '%' . $filters['doctor_nombre'] . '%');
            });
        }

        if (!empty($filters['estatus'])) {
            $query->where('estatus', $filters['estatus']);
        }

        if (!empty($filters['fecha_inicio']) && !empty($filters['fecha_fin'])) {
            $query->whereBetween('fecha_consulta', [$filters['fecha_inicio'], $filters['fecha_fin']]);
        }

        $perPage = $filters['per_page'] ?? 10; // Número de elementos por página, por defecto 10
        return $query->with(['paciente', 'doctor', 'signosVitales'])->paginate($perPage);
    }

    // Mostrar una consulta específica
    public function show($id)
    {
        return Consulta::with(['paciente', 'doctor', 'signosVitales'])->findOrFail($id);
    }

    // Crear una nueva consulta con signos vitales
    public function store(Request $request)
    {
        
        // Verificar que el paciente exista
        $paciente = Paciente::find($request->paciente_id);
        if (!$paciente) {
            return response()->json(['mensaje' => 'El paciente no existe'], 409);
        }

        // Verificar que el doctor exista
        $doctor = InformacionDoctor::find($request->doctor_id);
        if (!$doctor) {
            return response()->json(['mensaje' => 'El doctor no existe'], 409);
        }

        $validatedData = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'fecha_consulta' => 'required|date',
            'estatus' => 'required|in:abierta,enfermeria,completada',

            // Signos vitales
            'temperatura' => 'nullable|numeric',
            'frecuencia_cardiaca' => 'nullable|integer',
            'frecuencia_respiratoria' => 'nullable|integer',
            'presion_arterial' => 'nullable|string',
            'saturacion_oxigeno' => 'nullable|integer',
            'peso' => 'nullable|numeric',
            'talla' => 'nullable|numeric',
        ]);

        if ($validatedData->fails()) {
            return response()->json(['mensaje' => 'Error en la validación de los datos', 'errores' => $validatedData->errors()], 422);
        }

        if (!$validatedData) {
            return response()->json(['mensaje' => 'Error en la validación de los datos'], 422);
        }

        $horaConsulta = Carbon::parse($request->fecha_consulta)->format('H:i');
        $diaConsulta = Carbon::parse($request->fecha_consulta)->locale('es')->dayName; // ej. "lunes"
        $diaConsulta = str_replace(
            ['á', 'é', 'í', 'ó', 'ú'], 
            ['a', 'e', 'i', 'o', 'u'], 
            $diaConsulta
        );

        $horario = HorarioDoctor::where('doctor_id', $request->doctor_id)
            ->where('dia_semana', $diaConsulta)
            ->where('activo', true)
            ->whereTime('hora_inicio', '<=', $horaConsulta)
            ->whereTime('hora_fin', '>=', $horaConsulta)
            ->first();

        $fueraDeHorario = $horario ? false : true;


        // Crear la consulta
        $consulta = Consulta::create($request->only([
            'paciente_id',
            'doctor_id',
            'fecha_consulta',
            'motivo_consulta',
            'sintomas',
            'diagnostico',
            'indicaciones',
            'medicamentos',
            'servicios_medicos',
            'estatus',
        ]));
        $consulta->fuera_de_horario = $fueraDeHorario;
        $consulta->save();

        // Crear los signos vitales asociados
        $signos = new SignosVitales($request->only([
            'temperatura',
            'frecuencia_cardiaca',
            'frecuencia_respiratoria',
            'presion_arterial',
            'saturacion_oxigeno',
            'peso',
            'talla',
        ]));

        $signos->consulta_id = $consulta->id;
        $signos->save();

        return response()->json([
            'consulta' => $consulta->load(['paciente', 'doctor', 'signosVitales']),
            'mensaje' => 'Consulta registrada con signos vitales'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $consulta = Consulta::with('signosVitales')->findOrFail($id);

        $request->validate([
            'estatus' => 'nullable|in:abierta,enfermeria,completada',

            // Datos clínicos
            'motivo_consulta' => 'nullable|string',
            'sintomas' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'indicaciones' => 'nullable|string',
            'medicamentos' => 'nullable|array',
            'servicios_medicos' => 'nullable|array',

            // Signos vitales
            'temperatura' => 'nullable|numeric',
            'frecuencia_cardiaca' => 'nullable|integer',
            'frecuencia_respiratoria' => 'nullable|integer',
            'presion_arterial' => 'nullable|string',
            'saturacion_oxigeno' => 'nullable|integer',
            'peso' => 'nullable|numeric',
            'talla' => 'nullable|numeric',
        ]);
        

        // Actualizar consulta
        $consulta->update($request->only([
            'motivo_consulta',
            'sintomas',
            'diagnostico',
            'indicaciones',
            'medicamentos',
            'servicios_medicos',
            'estatus',
        ]));

        // Actualizar signos vitales si existen
        if ($consulta->signosVitales) {
            $consulta->signosVitales->update($request->only([
                'temperatura',
                'frecuencia_cardiaca',
                'frecuencia_respiratoria',
                'presion_arterial',
                'saturacion_oxigeno',
                'peso',
                'talla',
            ]));
        }

        return response()->json([
            'consulta' => $consulta->load('signosVitales'),
            'mensaje' => 'Consulta y signos vitales actualizados correctamente'
        ]);
    }

    // Eliminar (soft delete)
    public function destroy($id)
    {
        $consulta = Consulta::with('signosVitales')->findOrFail($id);
        if ($consulta->signosVitales) {
            $consulta->signosVitales->delete();
        }
        $consulta->delete();

        return response()->json(['mensaje' => 'Consulta eliminada (soft delete)']);
    }

    public function restore($id)
    {
        $consulta = Consulta::withTrashed()->with('signosVitales')->findOrFail($id);

        if ($consulta->trashed()) {
            $consulta->restore();

            if ($consulta->signosVitales && $consulta->signosVitales->trashed()) {
                $consulta->signosVitales->restore();
            }

            return response()->json(['mensaje' => 'Consulta y signos vitales restaurados']);
        }

        return response()->json(['mensaje' => 'La consulta no estaba eliminada'], 400);
    }


}
