<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\VitalSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VitalSignController extends Controller
{
    public function create($appointmentId)
    {
        $appointment = Appointment::with([
            'patient',
            'doctor.user',
            'vitalSign'
        ])->findOrFail($appointmentId);

        return view(
            'nurse.vitals.create',
            compact('appointment')
        );
    }

    public function store(Request $request, $appointmentId)
    {
        $request->validate([
            'temperature' => 'required|numeric|min:30|max:45',
            'systolic_bp' => 'required|integer|min:50|max:250',
            'diastolic_bp' => 'required|integer|min:30|max:150',
            'pulse' => 'required|integer|min:30|max:220',
            'weight' => 'required|numeric|min:1|max:300',
        ]);

        $appointment = Appointment::findOrFail($appointmentId);

        VitalSign::updateOrCreate(
            [
                'appointment_id' => $appointment->id,
            ],
            [
                'nurse_id' => Auth::id(),
                'temperature' => $request->temperature,
                'systolic_bp' => $request->systolic_bp,
                'diastolic_bp' => $request->diastolic_bp,
                'pulse' => $request->pulse,
                'weight' => $request->weight,
            ]
        );

        $appointment->update([
            'status' => 'waiting',
        ]);

        return redirect()
    ->route('nurse.vitals.summary', $appointment->id)
    ->with('success', 'Vital signs saved. Patient is ready for the doctor.');
    }

    public function summary($appointmentId)
{
    $appointment = Appointment::with([
        'patient',
        'doctor.user',
        'vitalSign.nurse'
    ])->findOrFail($appointmentId);

    return view(
        'nurse.vitals.summary',
        compact('appointment')
    );
}
public function destroy($appointmentId)
{
    $appointment = Appointment::with('vitalSign')
        ->findOrFail($appointmentId);

    if ($appointment->vitalSign) {
        $appointment->vitalSign->delete();
    }

    $appointment->update([
        'status' => 'confirmed',
    ]);

    return redirect()
        ->route('nurse.dashboard')
        ->with('success', 'Vital signs deleted successfully.');
}
}