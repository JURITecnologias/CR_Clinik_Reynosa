<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class add_default_configuracion_sistema extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aquí puedes agregar la lógica para insertar datos predeterminados en la tabla configuracion_sistema
        $configuraciones = [
            [
                'variable' => 'folio_receta',
                'valor' => '0001',
                'descripcion' => 'Folio de la receta médica',
                'tipo' => 'integer',
                'created_at' => now(),
            ],
            [
                'variable' => 'maintenance_mode',
                'valor' => 'false',
                'descripcion' => 'Indica si el sitio está en modo mantenimiento',
                'tipo' => 'boolean',
                'created_at' => now(),
            ],
            [
                'variable' => 'enable_modulo_citas',
                'valor' => 'true',
                'descripcion' => 'Habilita el módulo de citas',
                'created_at' => now(),
                'tipo' => 'boolean',
            ],
            [
                'variable' => 'enable_modulo_laboratorio',
                'valor' => 'false',
                'descripcion' => 'Habilita el módulo de laboratorio',
                'tipo' => 'boolean',
                'created_at' => now(),
            ],

        ];

        foreach ($configuraciones as $config) {
            if (DB::table('configuracion_sistema')->where('variable', $config['variable'])->exists()) {
                continue;
            }
            DB::table('configuracion_sistema')->insert($config);
        }
    }
}
