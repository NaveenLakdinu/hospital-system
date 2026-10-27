<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the Admin overview dashboard with clinic analytics.
     */
    public function index()
    {
        $totalDoctors = Doctor::count();
        $totalPatients = User::where('role', 'patient')->count();
        $todayAppointmentsCount = Appointment::whereDate('appointment_date', Carbon::today())->count();
        $totalAppointmentsCount = Appointment::count();

        $recentAppointments = Appointment::with(['patient', 'doctor.user'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalDoctors',
            'totalPatients',
            'todayAppointmentsCount',
            'totalAppointmentsCount',
            'recentAppointments'
        ));
    }
}
