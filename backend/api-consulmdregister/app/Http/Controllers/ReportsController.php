<?php

namespace App\Http\Controllers;

use App\Services\ReportServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\GenerateMedicalReportJob;
use App\Models\Report;
use Illuminate\Support\Facades\Response;


class ReportsController extends Controller
{
    protected $reportService;

    public function __construct(ReportServiceProvider $reportService)
    {
        $this->reportService = $reportService;
    }

    public function reporteServicios(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');


        return $this->reportService->reporteServicios($month, $year);
    }

    public function reporteServiciosEnfermeria(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        return $this->reportService->reporteServiciosEnfermeria($month, $year);
    }

    public function reporteUnidadDeEmergencia(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        return $this->reportService->DatosUnidadDeUrgencia($month, $year);
    }

    public function reporteConsultaExtGeneralYEsp(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        return $this->reportService->DatosConsultaExtGeneralYEsp($month, $year);
    }

    public function dispatchGenerarReporteMedico(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $report = Report::create([
            'month' => $month,
            'year' => $year,
            'file_path' => '',
            'status' => 'pending'
        ]);

        GenerateMedicalReportJob::dispatch($month, $year, $report->uuid);

        return response()->json(['message' => 'Reporte médico en proceso de generación.', 'uuid' => $report->uuid]);
    }

    public function getQueuedReport($uuid)
    {
        $report = Report::where('uuid', $uuid)->first();

        if (!$report) {
            return response()->json(['message' => 'Reporte no encontrado.'], 404);
        }

        return response()->json($report);

    }

    public function getListQueueReportsByMonthYear(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $reports = Report::where('month', $month)
                         ->where('year', $year)
                         ->orderBy('created_at', 'desc')
                         ->get();

        return response()->json($reports);
    }

    public function downloadReport($uuid)
    {
        $report = Report::where('uuid', $uuid)->first();

        if (!$report) {
            return response()->json(['message' => 'Reporte no encontrado.'], 404);
        }

        if ($report->status !== 'completed') {
            return response()->json(['message' => 'El reporte aún no está listo.'], 400);
        }

        return Response::download($report->file_path, 'informe_medico.xlsx');
    }

    public function getTotalPacientesPorSexo(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        return $this->reportService->getTotalPacientesPorSexo($month, $year);
    }
    
}
