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

    protected $MapServicesEnfermeriaRows = [
        'curaciones' => 10,
        'toma de tension arterial' => 11,
        'toma de glucosa capilar' => 12,
        'venoclisis' => 13,
        'cambio de sonda' => 14,
        'retiro de diu' => 15,
        'exceresis ungueal' => 16,
        'retiro de puntos' => 17,
        'colocación de ferulas' => 18,
        'retiro de ferulas' => 19,
        'nebulizaciones' => 20,
        'electrocardiograma' => 21,
        'lavado oftalmico' => 22,
        'lavado otico' => 23,
        'suturas' => 24,
        'aplicación im' => 25,
        'aplicación iv' => 26,
        'aplicación sc' => 27,
        'sello venoso' => 28,
        'oxigeno' => 29
    ];

    public function __construct(ReportServiceProvider $reportServiceProvider)
    {
        $this->reportServiceProvider = $reportServiceProvider;
    }

    public function generarExcel($month, $year, string $outputPath)
    {
        $spreadsheet = IOFactory::load(storage_path('app/templates/informe_medico_template.xlsx'));
        $sheet = $spreadsheet->setActiveSheetIndex(0);

       try {
            $sheetSerciosMedicos = $spreadsheet->setActiveSheetIndex(0);
            $this->generarExcelMedico($sheetSerciosMedicos, $month, $year);
        } catch (\Exception $e) {
            // Manejar el error, por ejemplo, registrarlo o lanzar una excepción personalizada
            throw new \Exception("Error al generar la sección médica en el reporte médico: " . $e->getMessage());
        }

        try {
            $sheetEnfermeria = $spreadsheet->setActiveSheetIndex(1);
            $this->generarExcelEnfermeria($sheetEnfermeria, $month, $year);
        } catch (\Exception $e) {
            // Manejar el error, por ejemplo, registrarlo o lanzar una excepción personalizada
            throw new \Exception("Error al generar la sección de enfermería en el reporte médico: " . $e->getMessage());
        }
        

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($outputPath);

    }

    protected function generarExcelEnfermeria($sheet, $month, $year)
    {

        $data = $this->reportServiceProvider->reporteServiciosEnfermeria($month, $year)->toArray();

        if (!is_array($data)) {
            throw new \Exception("Error al decodificar datos para el reporte médico: " . json_last_error_msg());
        }

        # llenar el mes y año en el template
        $sheet->setCellValue('K7', "MES: {$this->Meses[$month]}   AÑO:  {$year} ");
       
        foreach ($data as $item) {
            // $sheet->setCellValue('B' . $row, $item->servicio);
            // $sheet->setCellValue('D' . $row, $item->total ?? 0);
            // $row++;
            $row = $this->MapServicesEnfermeriaRows[$item->servicio] ?? null;
            if(!$row) {
                $lastRow = $this->MapServicesEnfermeriaRows ? max($this->MapServicesEnfermeriaRows) : 29;
                $fila = $lastRow + 1;
                $sheet->insertNewRowBefore($fila, 1);
                $servicioComp=ucwords(strtolower($item->servicio));
                $sheet->setCellValue('B' . $fila, $servicioComp);
                # llenar en 0 desde la columna D hasta la columna AH (31 días)
                for ($col = 4; $col <= 34; $col++) {
                    $sheet->setCellValue(Coordinate::stringFromColumnIndex($col) . $fila, 0);
                }

                #en la columna 35 (AH) se pone la formula para sumar los días del mes
                $columnaSuma = Coordinate::stringFromColumnIndex(35);
                $sheet->setCellValue($columnaSuma . $fila, "=SUM(D{$fila}:AH{$fila})");

                // Guardar en el mapa
                $this->MapServicesEnfermeriaRows[$item->servicio] = $fila;
                $row = $fila;
            }
            $columnaDia = Coordinate::stringFromColumnIndex(3 + $item->dia); 
            $sheet->setCellValue($columnaDia . $row, $item->total ?? 0);

        }
    }

    protected function generarExcelMedico($sheet, $month, $year)
    {
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

                    $columnaSuma = Coordinate::stringFromColumnIndex(35);
                    $sheet->setCellValue($columnaSuma . $fila, "=SUM(D{$fila}:AH{$fila})");

                    // Guardar en el mapa
                    $this->MapServicesRows[strtolower($item->servicio)] = $fila;
                    $row = $fila;
            }
            $columnaDia = Coordinate::stringFromColumnIndex(3 + $item->dia); 
            $sheet->setCellValue($columnaDia . $row, $item->total ?? 0);
        }
    }
}