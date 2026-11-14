<?php

namespace App\Http\Controllers;

use App\Models\PharmacyProfile;
use App\Models\Medicine;
use App\Models\DoctorMedicineNote;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
private function getProfile()
    {
        return PharmacyProfile::firstOrCreate(
            ['id' => 1],
            [
                'pharmacy_name' => 'MediCare Pharmacy',
                'contact_number' => '0771234567',
                'address' => 'No. 123, Health Avenue, Colombo 07',
                'email' => 'pharmacy@medicare.lk',
            ]
        );
    }

    public function dashboard()
    {
        $profile = $this->getProfile();
        $receivedNotes = DoctorMedicineNote::orderBy('received_at', 'desc')->get();
        $medicines = Medicine::orderBy('id', 'asc')->get();

        return view('pharmacy.dashboard', compact('profile', 'receivedNotes', 'medicines'));
    }