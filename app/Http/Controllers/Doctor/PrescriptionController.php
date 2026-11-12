<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    public function create($consultationId)
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $consultation = Consultation::with([
            'appointment.patient'
        ])
            ->where('doctor_id', $doctor->id)
            ->findOrFail($consultationId);

        return view(
            'doctor.prescriptions.create',
            compact('consultation')
        );
    }

    public function store(Request $request, $consultationId)
    {
        $request->validate([
            'medicine_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        $doctor = Auth::user()->doctor;

        $consultation = Consultation::where('doctor_id', $doctor->id)
            ->findOrFail($consultationId);

        DB::transaction(function () use ($request, $consultation, $doctor) {

            $prescription = Prescription::create([
                'appointment_id' => $consultation->appointment_id,
                'consultation_id' => $consultation->id,
                'doctor_id' => $doctor->id,
                'patient_id' => $consultation->patient_id,
                'instructions' => $request->instructions,
            ]);

            PrescriptionItem::create([
                'prescription_id' => $prescription->id,
                'medicine_name' => $request->medicine_name,
                'dosage' => $request->dosage,
                'frequency' => $request->frequency,
                'duration' => $request->duration,
                'instructions' => $request->instructions,
            ]);
        });

        return redirect()
            ->route('doctor.dashboard')
            ->with('success', 'Prescription created successfully.');
    }
}