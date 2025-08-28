<?php

namespace Database\Seeders;

use App\Models\ServicioMedico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosMedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviciosMedicos = [
            'Certificado Medico',
            'Cirugias Mayores (hospital)',
            'Cirugias Menores',
            'Consulta  Med. Gral',
            'Consulta Especialidad',
            'Defunciones',
            'Rayos X',
            'Servicio Dental',
            'Servicio de Laboratorios',
            'Ultrasonido',
            'Hospitalizaciones',
            'Partos',
        ];

        $serviciosEnfermeria = [
            'Curaciones',
            'Toma de Tension Arterial',
            'Toma de Glucosa Capilar',
            'Venoclisis',
            'Cambio de sonda',
            'Retiro de DIU',
            'Exceresis Ungueal',
            'Retiro de puntos',
            'Colocación de ferulas',
            'Retiro de Ferulas',
            'Nebulizaciones',
            'Electrocardiograma',
            'Lavado Oftalmico',
            'Lavado Otico',
            'Suturas',
            'Aplicación IM',
            'Aplicación IV',
            'Aplicación SC',
            'Sello venoso',
            'Oxigeno',
            'Toma de Signos Vitales',
        ];

        $serviciosAuxiliares = [
            'Toma de Signos Vitales',
            'Electrocardiograma',
            'Espirometria',
            'Audiometria',
            'Examen de la Vista',
            'Pruebas de Laboratorio',
            'Rayos X',
            'Ultrasonido',
            'Tomografia',
            'Resonancia Magnetica',
            'Densitometria Osea',
            'Laboratorio Analisis Clinicos',
            'Electrocardiograma',
            'Encefalograma'
        ];

        foreach ($serviciosMedicos as $nombre) {
            ServicioMedico::firstOrCreate(
                ['nombre' => $nombre],
                ['categoria' => 'medico']
            );
        }

        foreach ($serviciosEnfermeria as $nombre) {
            ServicioMedico::firstOrCreate(
                ['nombre' => $nombre],
                ['categoria' => 'enfermeria']
            );
        }

        foreach ($serviciosAuxiliares as $nombre) {
            ServicioMedico::firstOrCreate(
                ['nombre' => $nombre],
                ['categoria' => 'Auxiliares de Diagnostico']
            );
        }

    }
}
