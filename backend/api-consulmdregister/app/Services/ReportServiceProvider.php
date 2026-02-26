<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ReportServiceProvider
{
    public function reporteServicios($month, $year)
    {
        #validamos que month y year sean números enteros
        if (!is_numeric($month) || !is_numeric($year)) {
            throw new \InvalidArgumentException('Mes y año deben ser números enteros');
        }
        
        # validamos que el mes no sea menor a 1 o mayor a 12
        if ($month < 1 || $month > 12) {
            throw new \InvalidArgumentException('Mes inválido');
        }
        
        # validamos que el año no sea menor a 1900 o mayor al año actual
        if ($year < 1900 || $year > date('Y')) {
            throw new \InvalidArgumentException('Año inválido');
        }

        $sql = "
            SELECT 
                sm.nombre AS servicio,
                DAY(con.fecha_consulta) AS dia,
                MONTH(con.fecha_consulta) AS mes,
                YEAR(con.fecha_consulta) AS anio,
                COUNT(*) AS total
            FROM consultas con
            JOIN JSON_TABLE(
                con.servicios_medicos,
                '$[*]' COLUMNS (
                    id VARCHAR(50) PATH '$.id',
                    nombre VARCHAR(200) PATH '$.nombre'
                )
            ) AS m
            JOIN servicios_medicos sm 
            ON sm.id = m.id AND sm.categoria = 'medico'
            WHERE MONTH(con.fecha_consulta) = ".$month."
            AND YEAR(con.fecha_consulta) = ".$year."
            GROUP BY sm.nombre, anio, mes, dia
            ORDER BY sm.nombre, dia
        ";

        $resultados = DB::select($sql);

        // lo regresas al controlador como colección
        return collect($resultados);
    }


}