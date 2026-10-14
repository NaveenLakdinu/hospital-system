<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function show($appointmentId)
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $appointment = Appointment::with('patient')
            ->where('doctor_id', $doctor->id)
            ->findOrFail($appointmentId);

        return view(
            'doctor.consultations.show',
            compact('appointment')
        );
    }
}