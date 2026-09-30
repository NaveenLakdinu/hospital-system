<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
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



}
