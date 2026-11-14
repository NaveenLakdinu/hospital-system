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
            ['name' => 'Paracetamol 500mg', 'dosage_form' => 'Tablets', 'stock_qty' => 200, 'price' => 25.00],
            ['name' => 'Amoxicillin 500mg', 'dosage_form' => 'Capsules', 'stock_qty' => 120, 'price' => 150.00],
            ['name' => 'Metformin 500mg', 'dosage_form' => 'Tablets', 'stock_qty' => 80, 'price' => 100.00],
            ['name' => 'Omeprazole 20mg', 'dosage_form' => 'Capsules', 'stock_qty' => 150, 'price' => 80.00],
            ['name' => 'Ibuprofen 400mg', 'dosage_form' => 'Tablets', 'stock_qty' => 50, 'price' => 60.00],
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
                'doctor_name' => 'Dr. Nimal Perera',
                'patient_name' => 'K. Silva',
                'medicine_details' => 'Amoxicillin 500mg (Capsules)',
                'quantity' => 50,
                'instructions' => '1 capsule 3 times daily for 5 days.',
                'received_at' => '2026-11-11 14:15:00',
                'status' => 'Received',
            ],
            [
                'doctor_name' => 'Dr. Thilini Fernando',
                'patient_name' => 'S. Jayawardena',
                'medicine_details' => 'Metformin 500mg (Tablets)',
                'quantity' => 80,
                'instructions' => '1 tablet morning and night with meals.',
                'received_at' => '2026-11-10 11:20:00',
                'status' => 'Received',
            ],
            [
                'doctor_name' => 'Dr. Samantha Jayawardena',
                'patient_name' => 'R. Perera',
                'medicine_details' => 'Ibuprofen 400mg (Tablets)',
                'quantity' => 60,
                'instructions' => 'Take 1 tablet when pain occurs after food.',
                'received_at' => '2026-11-09 16:45:00',
                'status' => 'Received',
            ],
            [
                'doctor_name' => 'Dr. Suresh Kasthuriarachchi',
                'patient_name' => 'N. Kumari',
                'medicine_details' => 'Vitamin B Complex (Capsules)',
                'quantity' => 70,
                'instructions' => '1 capsule daily after breakfast.',
                'received_at' => '2026-11-08 09:30:00',
                'status' => 'Received',
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