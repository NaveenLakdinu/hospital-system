<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
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

        // 2. Doctor 1: Dr. Suresh Kasthuriarachchi (From SRS Document)
        $doctorUser1 = User::updateOrCreate(
            ['email' => 'doctor@familycare.com'],
            [
                'name' => 'Dr. Suresh Kasthuriarachchi',
                'password' => bcrypt('password123'),
                'role' => 'doctor',
            ]
        );

        $doctor1 = Doctor::updateOrCreate(
            ['user_id' => $doctorUser1->id],
            [
                'specialization' => 'General Physician & Anesthesiologist',
                'license_number' => 'SLMC-34912',
                'qualification' => 'MBBS (Sri Lanka)',
                'consultation_fee' => 1500.00,
                'room_number' => 'Room 01',
                'bio' => 'Experienced Medical Officer in Anesthesia/ICU at Base Hospital Galgamuwa, serving Family Care Medical Center.',
            ]
        );

        // Dr. Suresh Schedules (Monday, Wednesday, Friday: 4.00 PM - 8.00 PM)
        DoctorSchedule::updateOrCreate(
            ['doctor_id' => $doctor1->id, 'day_of_week' => 'Monday'],
            ['start_time' => '16:00:00', 'end_time' => '20:00:00', 'max_patients' => 25, 'is_active' => true]
        );
        DoctorSchedule::updateOrCreate(
            ['doctor_id' => $doctor1->id, 'day_of_week' => 'Wednesday'],
            ['start_time' => '16:00:00', 'end_time' => '20:00:00', 'max_patients' => 25, 'is_active' => true]
        );
        DoctorSchedule::updateOrCreate(
            ['doctor_id' => $doctor1->id, 'day_of_week' => 'Friday'],
            ['start_time' => '16:00:00', 'end_time' => '20:00:00', 'max_patients' => 25, 'is_active' => true]
        );

        // 3. Doctor 2: Dr. Anjali Perera (Pediatrician / ළමා රෝග)
        $doctorUser2 = User::updateOrCreate(
            ['email' => 'anjali@familycare.com'],
            [
                'name' => 'Dr. Anjali Perera',
                'password' => bcrypt('password123'),
                'role' => 'doctor',
            ]
        );

        $doctor2 = Doctor::updateOrCreate(
            ['user_id' => $doctorUser2->id],
            [
                'specialization' => 'Pediatrician',
                'license_number' => 'SLMC-41890',
                'qualification' => 'MBBS, MD (Pediatrics)',
                'consultation_fee' => 2000.00,
                'room_number' => 'Room 02',
                'bio' => 'Consultant Pediatrician dedicated to child health, vaccination, and newborn care.',
            ]
        );

        // Dr. Anjali Schedules (Tuesday, Saturday)
        DoctorSchedule::updateOrCreate(
            ['doctor_id' => $doctor2->id, 'day_of_week' => 'Tuesday'],
            ['start_time' => '17:00:00', 'end_time' => '20:00:00', 'max_patients' => 20, 'is_active' => true]
        );
        DoctorSchedule::updateOrCreate(
            ['doctor_id' => $doctor2->id, 'day_of_week' => 'Saturday'],
            ['start_time' => '09:00:00', 'end_time' => '13:00:00', 'max_patients' => 30, 'is_active' => true]
        );

        // 4. Pharmacist Account
        User::updateOrCreate(
            ['email' => 'pharmacist@familycare.com'],
            [
                'name' => 'Chief Pharmacist',
                'password' => bcrypt('password123'),
                'role' => 'pharmacist',
            ]
        );

        // 5. Sample Patient Account
        User::updateOrCreate(
            ['email' => 'patient@familycare.com'],
            [
                'name' => 'Nimal Perera',
                'password' => bcrypt('password123'),
                'role' => 'patient',
            ]
        );
    }
}
