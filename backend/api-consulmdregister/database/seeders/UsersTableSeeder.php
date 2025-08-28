<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('Passw0rd!'),
                'role' => 'Admon',
            ],
            [
                'name' => 'doctorUser',
                'email' => 'doctor@example.com',
                'password' => Hash::make('Passw0rd!'),
                'role' => 'Doctor',
            ],
            [
                'name' => 'enfermeraUser',
                'email' => 'enfermera@example.com',
                'password' => Hash::make('Passw0rd!'),
                'role' => 'Enfermera',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            $role = Role::where('name', $userData['role'])->first();
            $user->roles()->attach($role); // Usa ->role()->associate($role) si es relación uno a uno
        }

    }
}
