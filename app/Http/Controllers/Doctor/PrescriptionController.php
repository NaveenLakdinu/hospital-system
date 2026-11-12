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
    /**
     * Show prescription creation page.
     */
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

    /**
     * Save prescription.
     */
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

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $consultation = Consultation::where(
            'doctor_id',
            $doctor->id
        )->findOrFail($consultationId);

        $prescription = DB::transaction(function () use (
            $request,
            $consultation,
            $doctor
        ) {

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

            return $prescription;
        });

        return redirect()
            ->route(
                'doctor.prescription.summary',
                $prescription->id
            )
            ->with(
                'success',
                'Prescription saved successfully.'
            );
    }

    /**
     * Show saved prescription summary.
     */
    public function summary($prescriptionId)
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $prescription = Prescription::with([
            'patient',
            'doctor.user',
            'appointment',
            'consultation',
            'items'
        ])
            ->where('doctor_id', $doctor->id)
            ->findOrFail($prescriptionId);

        return view(
            'doctor.prescriptions.summary',
            compact('prescription')
        );
    }
}