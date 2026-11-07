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

    /**
     * Export the appointment report as a downloadable CSV.
     */
    public function exportCsv(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->toDateString());

        $appointments = Appointment::with(['patient', 'doctor.user'])
            ->whereBetween('appointment_date', [$startDate, $endDate])
            ->orderBy('appointment_date')
            ->get();

        $fileName = "FamilyCare_Report_{$startDate}_to_{$endDate}.csv";

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Token', 'Ref Number', 'Date', 'Time', 'Patient Name', 'Patient Email', 'Doctor Name', 'Specialization', 'Status', 'Reason'];

        $callback = function () use ($appointments, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($appointments as $apt) {
                fputcsv($file, [
                    $apt->token_number,
                    $apt->appointment_number,
                    $apt->appointment_date,
                    $apt->appointment_time,
                    $apt->patient?->name ?? 'N/A',
                    $apt->patient?->email ?? 'N/A',
                    $apt->doctor?->user?->name ?? 'N/A',
                    $apt->doctor?->specialization ?? 'N/A',
                    $apt->status,
                    $apt->reason_for_visit ?? 'N/A',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
