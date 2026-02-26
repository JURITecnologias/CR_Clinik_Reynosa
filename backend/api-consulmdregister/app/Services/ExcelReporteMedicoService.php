<?php

namespace App\Services;

use App\Services\ReportServiceProvider;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ExcelReporteMedicoService
{
    protected $reportServiceProvider;

    public function __construct(ReportServiceProvider $reportServiceProvider)
    {
        $this->reportServiceProvider = $reportServiceProvider;
    }

    public function generarExcel($month, $year, string $outputPath)
    {
        $spreadsheet = IOFactory::load(storage_path('app/templates/informe_medico_template.xlsx'));
        $sheet = $spreadsheet->setActiveSheetIndex(0);

        // reporteServicios devuelve colección
        $data = $this->reportServiceProvider->reporteServicios($month, $year)->toArray();
        
        if (!is_array($data)) {
            throw new \Exception("Error al decodificar datos para el reporte médico: " . json_last_error_msg());
        }

        $row = 27;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->servicio ?? '');
            $sheet->setCellValue('B' . $row, $item->total ?? 0);
            $row++;
        }

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($outputPath);

    }
}