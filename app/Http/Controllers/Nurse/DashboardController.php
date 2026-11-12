<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with([
            'patient',
            'doctor.user',
            'vitalSign'
        ])
        ->orderBy('appointment_date')
        ->orderBy('token_number')
        ->get();

        return view(
            'nurse.dashboard',
            compact('appointments')
        );
    }
}