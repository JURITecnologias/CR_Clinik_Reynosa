<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allPermissions = Permissions::all();

        $fullAccessRoles = ['Admon', 'Main Admin', 'Doctor'];
        $viewOnlyRole = 'Enfermera';

        foreach ($fullAccessRoles as $roleName) {
            $role = Role::where('name', $roleName)->first();
            $role->permissions()->sync($allPermissions->pluck('id'));
        }

        $enfermera = Role::where('name', $viewOnlyRole)->first();
        $verPermission = Permissions::where('name', 'ver')->first();
        $enfermera->permissions()->sync([$verPermission->id]);

    }
}
