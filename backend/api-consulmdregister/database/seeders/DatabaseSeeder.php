<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\MedicamentoSeeder as SeedersMedicamentoSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            RolePermissionSeeder::class,
            UsersTableSeeder::class,
            ServiciosMedicosSeeder::class,
            SeedersMedicamentoSeeder::class,
            add_default_configuracion_sistema::class,
            add_basicas_categorias_consumos::class,
            addSysConfirFolioOrdenClinica::class
        ]);
    }
}
