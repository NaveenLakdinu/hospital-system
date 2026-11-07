<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display all clinic appointments with dynamic filters.
     */
    public function index(Request $request)
    {
        $query = Appointment::with(['patient', 'doctor.user']);

        // Filter by Specific Date
        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->input('date'));
        }

        // Filter by Doctor
        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->input('doctor_id'));
        }

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $appointments = $query->latest('appointment_date')
            ->latest('appointment_time')
            ->paginate(15)
            ->withQueryString();

        $doctors = Doctor::has('user')->with('user')->get();

        return view('admin.appointments.index', compact('appointments', 'doctors'));
    }

    /**
     * Update appointment status (e.g. Completed or Cancelled).
     */
    public function updateStatus(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => ['required', 'in:Pending,Confirmed,Completed,Cancelled'],
        ]);

        $appointment->update([
            'status' => $request->status,
        ]);

        return back()->with('success', "Appointment #{$appointment->appointment_number} status updated to {$request->status}.");
    }
}
