<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    }
}


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PharmacyProfile;
use App\Models\Medicine;
use App\Models\DoctorMedicineNote;

class PharmacySeeder extends Seeder
{
    public function run(): void
    {
        PharmacyProfile::firstOrCreate(
            ['email' => 'pharmacy@medicare.lk'],
            [
                'pharmacy_name' => 'MediCare Pharmacy',
                'contact_number' => '0771234567',
                'address' => 'No. 123, Health Avenue, Colombo 07',
            ]
        );