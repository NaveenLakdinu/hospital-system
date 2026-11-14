<?php

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

        $medicines = [
            ['name' => 'Paracetamol 500mg', 'category' => 'Pain Relief', 'dosage_form' => 'Tablets', 'stock_qty' => 200, 'price' => 25.00],
            ['name' => 'Amoxicillin 500mg', 'category' => 'Antibiotics', 'dosage_form' => 'Capsules', 'stock_qty' => 120, 'price' => 150.00],
            ['name' => 'Metformin 500mg', 'category' => 'Diabetes', 'dosage_form' => 'Tablets', 'stock_qty' => 80, 'price' => 100.00],
            ['name' => 'Omeprazole 20mg', 'category' => 'Gastric', 'dosage_form' => 'Capsules', 'stock_qty' => 150, 'price' => 80.00],
            ['name' => 'Ibuprofen 400mg', 'category' => 'Pain Relief', 'dosage_form' => 'Tablets', 'stock_qty' => 50, 'price' => 60.00],
        ];

        foreach ($medicines as $med) {
            Medicine::firstOrCreate(['name' => $med['name']], $med);
        }

        $notes = [
            [
                'doctor_name' => 'Dr. Suresh Kasthuriarachchi',
                'patient_name' => 'M.A.D Thennakoon',
                'medicine_details' => 'Paracetamol 500mg (Tablets)',
                'quantity' => 100,
                'instructions' => 'Take 1 tablet every 8 hours after meals for fever.',
                'received_at' => '2026-11-12 10:30:00',
                'status' => 'Received',
            ],
            [
                'doctor_name' => 'Dr. Suresh Kasthuriarachchi',
                'patient_name' => 'N. Kumari',
                'medicine_details' => 'Vitamin B Complex (Capsules)',
                'quantity' => 70,
                'instructions' => '1 capsule daily after breakfast.',
                'received_at' => '2026-11-08 09:30:00',
                'status' => 'Issued',
            ],
        ];

        foreach ($notes as $note) {
            DoctorMedicineNote::firstOrCreate(
                ['doctor_name' => $note['doctor_name'], 'medicine_details' => $note['medicine_details']],
                $note
            );
        }
    }
}