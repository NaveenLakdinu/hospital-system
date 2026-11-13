<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WalkInController extends Controller
{
    public function create()
    {
        $patients = User::where('role', 'patient')
            ->orderBy('name')
            ->get();

        $doctors = Doctor::with('user')
            ->orderBy('id')
            ->get();

        return view(
            'nurse.walkins.create',
            compact('patients', 'doctors')
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'patient_type' => 'required|in:existing,new',
            'doctor_id' => 'required|exists:doctors,id',
            'reason_for_visit' => 'required|string|max:500',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Existing Patient
        |--------------------------------------------------------------------------
        */

        if ($request->patient_type === 'existing') {

            $request->validate([
                'patient_id' => 'required|integer',
            ]);

            $patient = User::where('role', 'patient')
                ->findOrFail($request->patient_id);

            $temporaryPassword = null;
        }

        /*
        |--------------------------------------------------------------------------
        | New Patient
        |--------------------------------------------------------------------------
        */

        else {

            $request->validate([
                'new_patient_name' => 'required|string|max:255',
                'new_patient_email' => 'required|email|max:255|unique:users,email',
            ]);

            /*
             * Temporary password for new patient account.
             */
            $temporaryPassword = 'Patient@' . random_int(1000, 9999);

            $patient = User::create([
                'name' => $request->new_patient_name,
                'email' => $request->new_patient_email,
                'password' => Hash::make($temporaryPassword),
                'role' => 'patient',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Get Next Token
        |--------------------------------------------------------------------------
        */

        $lastToken = Appointment::where(
                'doctor_id',
                $request->doctor_id
            )
            ->whereDate(
                'appointment_date',
                now()->toDateString()
            )
            ->max('token_number');

        $nextToken = ($lastToken ?? 0) + 1;


        /*
        |--------------------------------------------------------------------------
        | Create Walk-in Appointment
        |--------------------------------------------------------------------------
        */

        $appointment = Appointment::create([
            'appointment_number' =>
                'APT-WI-' .
                now()->format('YmdHis') .
                '-' .
                strtoupper(Str::random(4)),

            'patient_id' => $patient->id,

            'doctor_id' => $request->doctor_id,

            'appointment_date' => now()->toDateString(),

            'appointment_time' => now()->format('H:i:s'),

            'token_number' => $nextToken,

            'reason_for_visit' => $request->reason_for_visit,

            'status' => 'confirmed',

            'is_walk_in' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect Nurse Directly to Vital Signs
        |--------------------------------------------------------------------------
        */

        if ($temporaryPassword) {

            return redirect()
                ->route(
                    'nurse.vitals.create',
                    $appointment->id
                )
                ->with(
                    'success',
                    'New patient registered and added to today\'s queue.'
                )
                ->with(
                    'temporary_password',
                    $temporaryPassword
                )
                ->with(
                    'new_patient_email',
                    $patient->email
                );
        }


        return redirect()
            ->route(
                'nurse.vitals.create',
                $appointment->id
            )
            ->with(
                'success',
                'Walk-in patient added to today\'s queue.'
            );
    }
}