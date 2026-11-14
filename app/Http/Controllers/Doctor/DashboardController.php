<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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


    /**
     * Edit Doctor Profile
     */
    public function editProfile()
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Doctor profile not found.');
        }

        $doctor->load('user');

        return view(
            'doctor.profile-edit',
            compact('doctor')
        );
    }


    /**
     * Update Doctor Profile
     */
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
                Rule::unique('users', 'email')
                    ->ignore($user->id),
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

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Update User
        |--------------------------------------------------------------------------
        */

        $user->update([
            'email' => $validated['email'],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Handle Profile Photo
        |--------------------------------------------------------------------------
        */

        $profilePhotoPath = $doctor->profile_photo;

        if ($request->hasFile('profile_photo')) {

            // Delete previous photo
            if (
                $doctor->profile_photo &&
                Storage::disk('public')
                    ->exists($doctor->profile_photo)
            ) {
                Storage::disk('public')
                    ->delete($doctor->profile_photo);
            }

            // Store new photo
            $profilePhotoPath = $request
                ->file('profile_photo')
                ->store(
                    'doctor-profiles',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Update Doctor
        |--------------------------------------------------------------------------
        */

        $doctor->update([

            'qualification' =>
                $validated['qualification'] ?? null,

            'specialization' =>
                $validated['specialization'] ?? null,

            'room_number' =>
                $validated['room_number'] ?? null,

            'consultation_fee' =>
                $validated['consultation_fee'] ?? null,

            'bio' =>
                $validated['bio'] ?? null,

            'profile_photo' =>
                $profilePhotoPath,
        ]);


        return redirect()
            ->route('doctor.profile')
            ->with(
                'success',
                'Profile updated successfully.'
            );
    }
}