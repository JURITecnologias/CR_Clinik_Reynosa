<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    
    public function getTotalPacientes()
    {
        // Lógica para obtener el total de pacientes
        $totalPacientes = DB::table('pacientes')->count();

        return response()->json(['total_pacientes' => $totalPacientes]);
    }

    public function getTotalCitasUltimos60Dias()
    {
        $totalCitas = DB::table('citas_pacientes')
            ->where('fecha_cita', '>=', now()->subDays(60))
            ->count();

        return response()->json(['total_citas_ultimos_30_dias' => $totalCitas]);
    }

    public function getTotalCitasPorDoctorUltimos60Dias($doctorId)
    {
        $totalCitas = DB::table('citas_pacientes')
            ->where('doctor_id', $doctorId)
            ->where('fecha_cita', '>=', now()->subDays(60))
            ->count();

        return response()->json(['total_citas_por_doctor_ultimos_60_dias' => $totalCitas]);
    }

    public function getTotalOrdenesClinicasUltimos60Dias()
    {
        $totalOrdenesClinicas = DB::table('ordenes_clinicas')
            ->where('created_at', '>=', now()->subDays(60))
            ->where('estado', '==', 'completada')
            ->count();

        $totalOrdenesClinicasPendientes= DB::table('ordenes_clinicas')
            ->where('created_at', '>=', now()->subDays(60))
            ->where('estado', '!=', 'completada')
            ->where('estado', '!=', 'cancelada')
            ->count();

        return response()->json(['total_ordenes_clinicas_ultimos_60_dias' => $totalOrdenesClinicas,
                                 'total_ordenes_clinicas_pendientes_ultimos_60_dias' => $totalOrdenesClinicasPendientes]);
    }

    public function getTotalConsultasFueraDeHorarioUltimos60Dias()
    {
        $totalConsultasFueraDeHorario = DB::table('consultas')
            ->where('created_at', '>=', now()->subDays(60))
            ->where('fuera_de_horario', true)
            ->count();

        $totalConsultas= DB::table('consultas')
            ->where('created_at', '>=', now()->subDays(120))
            ->where('fuera_de_horario', false)
            ->count();

        return response()->json(['total_consultas_fuera_de_horario_ultimos_60_dias' => $totalConsultasFueraDeHorario,
                                 'total_consultas_ultimos_60_dias' => $totalConsultas]);
    }

    public function getLastCitasUpcoming(Request $request)
    {
        $limit = $request->input('limit', 10); // Default to 10 if not provided

        $citas = DB::table('citas_pacientes')
            ->where('fecha_cita', '>=', now())
            ->orderBy('fecha_cita', 'asc')
            ->limit($limit)
            ->get();

        return response()->json(['upcoming_citas' => $citas]);
    }

    public function getMetrictPacientesConsultarHombreOMujer()
    {
        $metric = DB::table('consultas')
        ->join('pacientes','consultas.paciente_id','=','pacientes.id')
        ->select('fecha_consulta','pacientes.sexo', DB::raw('count(*) as total'))
        ->groupBy('fecha_consulta','pacientes.sexo')
        ->get();

        $data = DB::table('consultas')
                ->join('pacientes','consultas.paciente_id','=','pacientes.id')
                ->select(
                    'fecha_consulta',
                    DB::raw("SUM(CASE WHEN pacientes.sexo = 'M' THEN 1 ELSE 0 END) as total_sexo_M"),
                    DB::raw("SUM(CASE WHEN pacientes.sexo = 'F' THEN 1 ELSE 0 END) as total_sexo_F")
                )
                ->groupBy('fecha_consulta')
                ->get();


        return response()->json([
            'total_hombres' => $metric->where('sexo', 'M')->sum('total'),
            'total_mujeres' => $metric->where('sexo', 'F')->sum('total'),
            'data' => $data
        ]);
    }
}
