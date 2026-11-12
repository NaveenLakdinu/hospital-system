<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Http\Request;
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
            ->where('id', $appointmentId)
            ->firstOrFail();

        return view(
            'doctor.consultations.show',
            compact('appointment')
        );
    }

    public function store(Request $request, $appointmentId)
    {
        $request->validate([
            'diagnosis' => 'required|string',
            'consultation_notes' => 'nullable|string',
        ]);

        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $appointment = Appointment::where('doctor_id', $doctor->id)
            ->findOrFail($appointmentId);

        $consultation = Consultation::create([
            'appointment_id' => $appointment->id,
            'doctor_id' => $doctor->id,
            'patient_id' => $appointment->patient_id,
            'diagnosis' => $request->diagnosis,
            'consultation_notes' => $request->consultation_notes,
        ]);

        return redirect()
            ->route('doctor.prescription.create', $consultation->id)
            ->with('success', 'Consultation saved successfully.');
    }
}