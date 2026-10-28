<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with(['patient', 'doctor.user']);

        // Filter by Specific Date
        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->input('date'));
        }



        ));
    }
}
