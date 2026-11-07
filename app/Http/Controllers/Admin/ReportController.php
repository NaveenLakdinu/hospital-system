<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display the clinic reporting and analytics dashboard.
     */
    public function index(Request $request)
    {
        // Default to current month if no dates selected
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->toDateString());

        $baseQuery = Appointment::whereBetween('appointment_date', [$startDate, $endDate]);

        // 1. Overall Volume Statistics
        $totalAppointments = (clone $baseQuery)->count();
        $confirmedCount = (clone $baseQuery)->where('status', 'Confirmed')->count();
        $completedCount = (clone $baseQuery)->where('status', 'Completed')->count();
        $cancelledCount = (clone $baseQuery)->where('status', 'Cancelled')->count();

        // 2. Doctor Utilisation (Most Booked Doctors)
        $doctorStats = Doctor::with('user')
            ->withCount(['appointments' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('appointment_date', [$startDate, $endDate]);
            }])
            ->withCount(['appointments as completed_appointments_count' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('appointment_date', [$startDate, $endDate])
                      ->where('status', 'Completed');
            }])
            ->orderByDesc('appointments_count')
            ->get();

            // 3. Daily Booking Breakdown
        $dailyBreakdown = (clone $baseQuery)
            ->select('appointment_date', DB::raw('count(*) as count'))
            ->groupBy('appointment_date')
            ->orderBy('appointment_date')
            ->get();

        return view('admin.reports.index', compact(
            'startDate',
            'endDate',
            'totalAppointments',
            'confirmedCount',
            'completedCount',
            'cancelledCount',
            'doctorStats',
            'dailyBreakdown'
        ));
    }
