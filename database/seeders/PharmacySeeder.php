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

        medicines = [
            ['name' => 'Paracetamol 500mg', 'dosage_form' => 'Tablets', 'stock_qty' => 200, 'price' => 25.00],
            ['name' => 'Amoxicillin 500mg', 'dosage_form' => 'Capsules', 'stock_qty' => 120, 'price' => 150.00],
            ['name' => 'Metformin 500mg', 'dosage_form' => 'Tablets', 'stock_qty' => 80, 'price' => 100.00],
            ['name' => 'Omeprazole 20mg', 'dosage_form' => 'Capsules', 'stock_qty' => 150, 'price' => 80.00],
            ['name' => 'Ibuprofen 400mg', 'dosage_form' => 'Tablets', 'stock_qty' => 50, 'price' => 60.00],
        ];foreach ($medicines as $med) {
            Medicine::firstOrCreate(['name' => $med['name']], $med);
        }