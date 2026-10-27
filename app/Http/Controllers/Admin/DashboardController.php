<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class DoctorController extends Controller
{
    /**
     * Display a listing of all clinic doctors.
     */
    public function index()
    {
        $doctors = Doctor::has('user')
            ->with(['user', 'schedules'])
            ->latest()
            ->paginate(10);

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for onboarding a new doctor.
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly onboarded doctor and their user account.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'specialization' => ['required', 'string', 'max:255'],
            'license_number' => ['required', 'string', 'max:100', 'unique:doctors,license_number'],
            'qualification' => ['required', 'string', 'max:255'],
            'consultation_fee' => ['required', 'numeric', 'min:0'],
            'room_number' => ['nullable', 'string', 'max:50'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ]);

        DB::transaction(function () use ($validated) {
            // 1. Create Login User Account with 'doctor' role
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role' => 'doctor',
            ]);

            // 2. Create Doctor Profile linked to the User
            Doctor::create([
                'user_id' => $user->id,
                'specialization' => $validated['specialization'],
                'license_number' => $validated['license_number'],
                'qualification' => $validated['qualification'],
                'consultation_fee' => $validated['consultation_fee'],
                'room_number' => $validated['room_number'] ?? null,
                'bio' => $validated['bio'] ?? null,
            ]);
        });

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'New doctor onboarded and account created successfully!');
    }

    /**
     * Remove the specified doctor and their user account.
     */
    public function destroy(Doctor $doctor)
    {
        if ($doctor->user) {
            $doctor->user->delete(); // Cascades and deletes the doctor record too
        } else {
            $doctor->delete();
        }

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor account removed successfully.');
    }
}
