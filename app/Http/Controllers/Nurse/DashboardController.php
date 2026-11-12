<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

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


    public function profile()
    {
        $nurse = Auth::user();

        if (!$nurse || $nurse->role !== 'nurse') {
            abort(403, 'Nurse profile not found.');
        }

        return view(
            'nurse.profile',
            compact('nurse')
        );
    }
}