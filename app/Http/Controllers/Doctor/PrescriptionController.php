<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    public function create($appointmentId)
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $appointment = Appointment::with('patient')
            ->where('doctor_id', $doctor->id)
            ->findOrFail($appointmentId);

        $consultation = Consultation::where('appointment_id', $appointment->id)
            ->where('doctor_id', $doctor->id)
            ->latest()
            ->firstOrFail();

        return view(
            'doctor.prescriptions.create',
            compact('appointment', 'consultation')
        );
    }

    public function store(Request $request, $appointmentId)
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $appointment = Appointment::where('doctor_id', $doctor->id)
            ->findOrFail($appointmentId);

        $consultation = Consultation::where('appointment_id', $appointment->id)
            ->where('doctor_id', $doctor->id)
            ->latest()
            ->firstOrFail();

        $validated = $request->validate([
            'medicine_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        $prescription = Prescription::create([
            'appointment_id' => $appointment->id,
            'consultation_id' => $consultation->id,
            'doctor_id' => $doctor->id,
            'patient_id' => $appointment->patient_id,
            'instructions' => $validated['instructions'] ?? null,
        ]);

        PrescriptionItem::create([
            'prescription_id' => $prescription->id,
            'medicine_name' => $validated['medicine_name'],
            'dosage' => $validated['dosage'],
            'frequency' => $validated['frequency'],
            'duration' => $validated['duration'],
            'instructions' => $validated['instructions'] ?? null,
        ]);

        $appointment->update([
            'status' => 'completed',
        ]);

        return redirect()
            ->route('doctor.dashboard')
            ->with('success', 'Prescription saved successfully.');
    }
}