<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin Account
        User::updateOrCreate(
            ['email' => 'admin@familycare.com'],
            [
                'name' => 'System Admin',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(['email' => 'doctor@familycare.com'], [
            'name' => 'Dr. Suresh Kasthuriarachchi',
            'password' => Hash::make('password123'),
            'role' => 'doctor',
        ]);

        // 3. Pharmacist
        User::updateOrCreate(['email' => 'pharmacist@familycare.com'], [
            'name' => 'Chief Pharmacist',
            'password' => Hash::make('password123'),
            'role' => 'pharmacist',
        ]);

        // 4. Sample Patient
        User::updateOrCreate(['email' => 'patient@familycare.com'], [
            'name' => 'Nimal Perera',
            'password' => Hash::make('password123'),
            'role' => 'patient',
        ]);
    }
}
