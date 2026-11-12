<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\VitalSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VitalSignController extends Controller
{
    /**
     * Show Add / Edit Vital Signs page
     */
    public function create($appointmentId)
    {
        $appointment = Appointment::with([
            'patient',
            'doctor.user',
            'vitalSign'
        ])->findOrFail($appointmentId);


        /*
        |--------------------------------------------------------------------------
        | Prevent editing after doctor starts consultation
        |--------------------------------------------------------------------------
        */

        if ($appointment->consultation_started_at) {

            return redirect()
                ->route(
                    'nurse.vitals.summary',
                    $appointment->id
                )
                ->with(
                    'error',
                    'Vital signs are locked because the doctor has already started the consultation.'
                );
        }


        return view(
            'nurse.vitals.create',
            compact('appointment')
        );
    }


    /**
     * Save new vitals or update existing vitals
     */
    public function store(
        Request $request,
        $appointmentId
    ) {
        $appointment = Appointment::with('vitalSign')
            ->findOrFail($appointmentId);


        /*
        |--------------------------------------------------------------------------
        | Prevent changes after consultation starts
        |--------------------------------------------------------------------------
        */

        if ($appointment->consultation_started_at) {

            return redirect()
                ->route(
                    'nurse.vitals.summary',
                    $appointment->id
                )
                ->with(
                    'error',
                    'Vital signs cannot be changed because the doctor has already started the consultation.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'temperature' => [
                'required',
                'numeric',
                'min:30',
                'max:45',
            ],

            'systolic_bp' => [
                'required',
                'integer',
                'min:50',
                'max:250',
            ],

            'diastolic_bp' => [
                'required',
                'integer',
                'min:30',
                'max:150',
            ],

            'pulse' => [
                'required',
                'integer',
                'min:30',
                'max:220',
            ],

            'weight' => [
                'required',
                'numeric',
                'min:1',
                'max:300',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Create or Update Vital Signs
        |--------------------------------------------------------------------------
        */

        VitalSign::updateOrCreate(

            [
                'appointment_id' => $appointment->id
            ],

            [
                'nurse_id' => Auth::id(),

                'temperature' =>
                    $validated['temperature'],

                'systolic_bp' =>
                    $validated['systolic_bp'],

                'diastolic_bp' =>
                    $validated['diastolic_bp'],

                'pulse' =>
                    $validated['pulse'],

                'weight' =>
                    $validated['weight'],
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Patient Ready For Doctor
        |--------------------------------------------------------------------------
        */

        $appointment->update([
            'status' => 'waiting',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect To Summary
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'nurse.vitals.summary',
                $appointment->id
            )
            ->with(
                'success',
                $appointment->vitalSign
                    ? 'Vital signs updated successfully.'
                    : 'Vital signs recorded successfully. Patient is ready for the doctor.'
            );
    }


    /**
     * Vital Signs Summary
     */
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


    /**
     * Delete Vital Signs
     */
    public function destroy($appointmentId)
    {
        $appointment = Appointment::with(
            'vitalSign'
        )->findOrFail($appointmentId);


        /*
        |--------------------------------------------------------------------------
        | Prevent deletion after consultation starts
        |--------------------------------------------------------------------------
        */

        if ($appointment->consultation_started_at) {

            return redirect()
                ->route('nurse.dashboard')
                ->with(
                    'error',
                    'Vital signs cannot be deleted because the doctor has already started the consultation.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Vital Record
        |--------------------------------------------------------------------------
        */

        if ($appointment->vitalSign) {

            $appointment
                ->vitalSign
                ->delete();
        }


        /*
        |--------------------------------------------------------------------------
        | Return Appointment To Confirmed
        |--------------------------------------------------------------------------
        */

        $appointment->update([
            'status' => 'confirmed',
        ]);


        return redirect()
            ->route('nurse.dashboard')
            ->with(
                'success',
                'Vital signs deleted successfully.'
            );
    }
}