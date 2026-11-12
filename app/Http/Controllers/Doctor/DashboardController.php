<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        ->whereDate(
            'appointment_date',
            '>=',
            now()->toDateString()
        )

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

    public function editProfile()
{
    $doctor = Auth::user()->doctor;

    if (!$doctor) {
        abort(403, 'Doctor profile not found.');
    }

    $doctor->load('user');

    return view('doctor.profile-edit', compact('doctor'));
}


public function updateProfile(Request $request)
{
    $user = Auth::user();
    $doctor = $user->doctor;

    if (!$doctor) {
        abort(403, 'Doctor profile not found.');
    }

    $validated = $request->validate([
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($user->id),
        ],

        'qualification' => [
            'nullable',
            'string',
            'max:255',
        ],

        'specialization' => [
            'nullable',
            'string',
            'max:255',
        ],

        'room_number' => [
            'nullable',
            'string',
            'max:100',
        ],

        'consultation_fee' => [
            'nullable',
            'numeric',
            'min:0',
        ],

        'bio' => [
            'nullable',
            'string',
            'max:2000',
        ],
    ]);

    $user->update([
        'email' => $validated['email'],
    ]);

    $doctor->update([
        'qualification' => $validated['qualification'] ?? null,
        'specialization' => $validated['specialization'] ?? null,
        'room_number' => $validated['room_number'] ?? null,
        'consultation_fee' => $validated['consultation_fee'] ?? null,
        'bio' => $validated['bio'] ?? null,
    ]);

    return redirect()
        ->route('doctor.profile')
        ->with('success', 'Profile updated successfully.');
}
}