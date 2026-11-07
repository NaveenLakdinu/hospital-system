<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * Show the consultation page.
     */
    public function show($appointment)
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $appointment = Appointment::with('patient')
            ->where('doctor_id', $doctor->id)
            ->where('id', $appointment)
            ->firstOrFail();

        $consultation = Consultation::where(
            'appointment_id',
            $appointment->id
        )
            ->where('doctor_id', $doctor->id)
            ->latest()
            ->first();

        return view(
            'doctor.consultations.show',
            compact('appointment', 'consultation')
        );
    }

    /**
     * Save consultation details.
     */
    public function store(Request $request, $appointment)
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $appointment = Appointment::where(
            'doctor_id',
            $doctor->id
        )
            ->where('id', $appointment)
            ->firstOrFail();

        $validated = $request->validate([
            'diagnosis' => 'required|string',
            'consultation_notes' => 'nullable|string',
        ]);

        $consultation = Consultation::updateOrCreate(
            [
                'appointment_id' => $appointment->id,
                'doctor_id' => $doctor->id,
            ],
            [
                'patient_id' => $appointment->patient_id,
                'diagnosis' => $validated['diagnosis'],
                'consultation_notes' =>
                    $validated['consultation_notes'] ?? null,
            ]
        );

        return redirect()
            ->route(
                'doctor.prescription.create',
                $appointment->id
            )
            ->with(
                'success',
                'Consultation saved successfully.'
            );
    }
}