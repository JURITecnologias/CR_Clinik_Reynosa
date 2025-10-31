<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class add_basicas_categorias_consumos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $categorias = [
            [
                'nombre' => 'Material de Sutura',
                'descripcion' => 'Agujas, hilos quirúrgicos, porta agujas y material relacionado con suturas',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Material de Inyección',
                'descripcion' => 'Jeringas, agujas hipodérmicas y accesorios para aplicación de inyecciones',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Material de Curación',
                'descripcion' => 'Gasas, vendas, apósitos, esparadrapo y material para curaciones',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Antisépticos y Desinfectantes',
                'descripcion' => 'Alcohol, yodo, clorhexidina, agua oxigenada y otros antisépticos',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Guantes y Protección',
                'descripcion' => 'Guantes estériles, no estériles, cubrebocas, batas y equipo de protección',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Sondas y Catéteres',
                'descripcion' => 'Sondas vesicales, nasogástricas, catéteres intravenosos y accesorios',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Material de Laboratorio',
                'descripcion' => 'Tubos de ensayo, lancetas, contenedores de muestras y material de laboratorio',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Soluciones Parenterales',
                'descripcion' => 'Sueros, soluciones intravenosas, equipos de venoclisis',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Material Descartable',
                'descripcion' => 'Abatelenguas, algodón, hisopos, torundas y material desechable general',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Instrumental Menor',
                'descripcion' => 'Pinzas, tijeras, bisturís desechables y instrumental quirúrgico menor',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Material de Oxigenoterapia',
                'descripcion' => 'Cánulas nasales, mascarillas de oxígeno, nebulizadores y accesorios',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
            [
                'nombre' => 'Kits Pre-armados',
                'descripcion' => 'Kits de inyección, kits de curación, kits de sutura y otros conjuntos predefinidos',
                'created_at' => $now,
                'updated_at' => $now,
                'uuid' => (string) \Illuminate\Support\Str::uuid()
            ],
        ];

        DB::table('categoria_consumibles')->insert($categorias);
    }
}
