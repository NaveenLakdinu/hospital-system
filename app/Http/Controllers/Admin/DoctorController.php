<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['user', 'schedules'])->latest()->paginate(10);
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

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
           $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role' => 'doctor',
            ]);

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
            ->with('success', 'Doctor onboarded and account created successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        // Next step
    }
}
