<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    /**
     * Show the appointment booking form for a specific doctor.
     */
    public function create(Doctor $doctor)
    {
        $doctor->load(['user', 'schedules' => function ($q) {
            $q->where('is_active', true);
        }]);

        return view('appointments.book', compact('doctor'));
    }

    /**
     * Store a newly created appointment in database.
     */
    public function store(Request $request, Doctor $doctor)
    {
        $request->validate([
            'appointment_date' => ['required', 'date', 'after_or_equal:today'],
            'reason_for_visit' => ['nullable', 'string', 'max:500'],
        ]);

        $bookingDate = Carbon::parse($request->appointment_date);
        $dayOfWeek = $bookingDate->format('l'); // e.g. "Monday"

        // 1. Check if the doctor has an active schedule on this day
        $schedule = $doctor->schedules()
            ->where('day_of_week', $dayOfWeek)
            ->where('is_active', true)
            ->first();

        if (! $schedule) {
            return back()->withInput()->withErrors([
                'appointment_date' => "Dr. {$doctor->user?->name} is not available on {$dayOfWeek}s. Please choose an available clinic day.",
            ]);
        }

        // 2. Check maximum patient capacity for the selected session
        $activeAppointmentsCount = Appointment::where('doctor_id', $doctor->id)
            ->where('appointment_date', $request->appointment_date)
            ->where('status', '!=', 'Cancelled')
            ->count();

        if ($activeAppointmentsCount >= $schedule->max_patients) {
            return back()->withInput()->withErrors([
                'appointment_date' => "All appointment tokens for this date are fully booked ({$schedule->max_patients}/{$schedule->max_patients}). Please pick another date.",
            ]);
        }

        // 3. Issue Next Token Number and Unique Reference
        $tokenNumber = $activeAppointmentsCount + 1;
        $appointmentNumber = 'APP-' . date('Ymd') . '-' . strtoupper(Str::random(4));

        // 4. Save Appointment
        Appointment::create([
            'appointment_number' => $appointmentNumber,
            'patient_id' => Auth::id(), 
            'doctor_id' => $doctor->id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $schedule->start_time,
            'token_number' => $tokenNumber,
            'reason_for_visit' => $request->reason_for_visit,
            'status' => 'Confirmed',
        ]);

        return redirect()->route('appointments.my')->with('success', "Appointment booked successfully! Your Token Number is #{$tokenNumber}.");
    }

    /**
     * Display authenticated patient's appointments.
     */
    public function myAppointments()
    {
        $appointments = Appointment::where('patient_id', Auth::id())
            ->with('doctor.user')
            ->latest('appointment_date')
            ->paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Cancel an appointment.
     */
    public function cancel(Appointment $appointment)
    {
        if ($appointment->patient_id !== Auth::id()) {
            abort(403);
        }

        $appointment->update(['status' => 'Cancelled']);

        return back()->with('success', 'Appointment cancelled successfully.');
    }
}
