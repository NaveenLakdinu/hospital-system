<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with([
            'patient',
            'doctor.user'
        ])
        ->whereDate('appointment_date', Carbon::today())
        ->orderBy('token_number')
        ->get();

        return view(
            'nurse.dashboard',
            compact('appointments')
        );
    }
}