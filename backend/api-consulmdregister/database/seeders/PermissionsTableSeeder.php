<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['ver', 'escribir', 'modificar','borrar'];

        foreach ($permissions as $perm) {
            Permissions::create(['name' => $perm]);
        }


    }
}
