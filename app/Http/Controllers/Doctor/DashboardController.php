<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Doctor Dashboard
     */
    public function dashboard()
{
    $doctor = Auth::user()->doctor;

    if (!$doctor) {
        abort(403, 'Doctor profile not found.');
    }

    $appointments = Appointment::with([
        'patient',
        'prescription',
        'vitalSign'
    ])
        ->where('doctor_id', $doctor->id)

        // Today + future appointments
        ->whereDate('appointment_date', '>=', now()->toDateString())

        ->orderBy('appointment_date', 'asc')
        ->orderBy('token_number', 'asc')
        ->get();

    return view(
        'doctor.dashboard',
        compact('appointments')
    );
}


    /**
     * Doctor Profile
     */
    public function profile()
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $doctor->load('user');

        return view(
            'doctor.profile',
            compact('doctor')
        );
    }
}