<?php

namespace App\Services;

use App\Services\ReportServiceProvider;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;


class ExcelReporteMedicoService
{
    protected $reportServiceProvider;
    protected $MapServicesRows = [
        'certificado medico' => 10,
        'cirugias mayores (hospital)' => 11,
        'cirugias menores' => 12,
        'consulta med. gral' => 13,
        'consulta especialidad' => 14,
        'defunciones' => 15,
        'rayos x' => 16,
        'servicio dental' => 17,
        'servicio de laboratorios' => 18,
        'ultrasonidos' => 19,
        'hospitalizaciones' => 20,
        'partos' => 21,
    ];
    protected $Meses = [
        1 => 'ENERO',
        2 => 'FEBRERO',
        3 => 'MARZO',
        4 => 'ABRIL',
        5 => 'MAYO',
        6 => 'JUNIO',
        7 => 'JULIO',
        8 => 'AGOSTO',
        9 => 'SEPTIEMBRE',
        10 => 'OCTUBRE',
        11 => 'NOVIEMBRE',
        12 => 'DICIEMBRE'
    ];

    public function __construct(ReportServiceProvider $reportServiceProvider)
    {
        $this->reportServiceProvider = $reportServiceProvider;
    }

    public function generarExcel($month, $year, string $outputPath)
    {
        $spreadsheet = IOFactory::load(storage_path('app/templates/informe_medico_template.xlsx'));
        $sheet = $spreadsheet->setActiveSheetIndex(0);

        ## Pagina de SERVICIOS MEDICOS
        // reporteServicios devuelve colección
        $data = $this->reportServiceProvider->reporteServicios($month, $year)->toArray();
        
        if (!is_array($data)) {
            throw new \Exception("Error al decodificar datos para el reporte médico: " . json_last_error_msg());
        }

        # llenar el mes y año en el template
        $sheet->setCellValue('K7', "MES: {$this->Meses[$month]}   AÑO:  {$year} ");

        foreach ($data as $item) {
            $row = $this->MapServicesRows[strtolower($item->servicio)] ?? $row;
            if(!$row) {
                // Servicio nuevo → agregar fila al final
                #obtenemos el ultimo valor del mapa para saber en que fila insertar el nuevo servicio
                $lastRow = $this->MapServicesRows ? max($this->MapServicesRows) : 21;
                $fila = $lastRow + 1;
                $sheet->insertNewRowBefore($fila, 1);
                $sheet->setCellValue('C' . $fila, $item->servicio);
                # llenar en 0 desde la columna D hasta la columna AH (31 días)
                for ($col = 4; $col <= 34; $col++) {
                    $sheet->setCellValue(Coordinate::stringFromColumnIndex($col) . $fila, 0);
                }

                // Guardar en el mapa
                $mapServicios[$item->servicio] = $fila;
            }
            $columnaDia = Coordinate::stringFromColumnIndex(3 + $item->dia); 
            $sheet->setCellValue($columnaDia . $row, $item->total ?? 0);
        }

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($outputPath);

    }
}