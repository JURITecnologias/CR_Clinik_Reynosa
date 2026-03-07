<?php

namespace App\Jobs;

use App\Services\ExcelReporteMedicoService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Report;
use Illuminate\Support\Facades\Log;

class GenerateMedicalReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $month;
    protected $year;
    protected $uuid;

    /**
     * Create a new job instance.
     */
    public function __construct($month, $year, $uuid)
    {
        $this->month = $month;
        $this->year = $year;
        $this->uuid = $uuid;
    }

    /**
     * Execute the job.
     */
    public function handle(ExcelReporteMedicoService $service): void
    {
        $report = Report::where('uuid', $this->uuid)->first();
        try {
            $outputPath = storage_path('app/public/informe_medico_' . time() . '.xlsx');
            $service->generarExcel($this->month, $this->year, $outputPath);

            // Guardar el registro del informe en la base de datos
            $report->file_path = $outputPath;
            $report->status = 'completed';
            $report->save();
        } catch (\Exception $e) {
           $report->update([
            'status' => 'failed',
            ]);
           Log::error("Error generando reporte {$report->uuid}: " . $e->getMessage());
           throw $e; // Re-lanzar la excepción para que el sistema de colas pueda manejarla (ej. reintentos)
        }

    }

    public function failed(\Throwable $exception): void
    {
        $report = Report::where('uuid', $this->uuid)->first();

        if ($report) {
            $report->update(['status' => 'failed']);
        }
    }
}
