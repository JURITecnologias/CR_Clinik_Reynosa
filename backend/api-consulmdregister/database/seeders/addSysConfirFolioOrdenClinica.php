<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class addSysConfirFolioOrdenClinica extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $configuraciones = [
            [
                'variable' => 'folio_orden_clinica',
                'valor' => '1',
                'descripcion' => 'Folio de la orden clínica',
                'tipo' => 'integer',
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
