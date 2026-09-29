<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of doctors with optional search and filters.
     */
    public function index(Request $request)
    {
        $query = Doctor::has('user')->with(['user', 'schedules' => function ($q) {
            $q->where('is_active', true);
        }]);

        // 1. Filter by Doctor Name or Keyword
        if ($request->filled('query')) {
            $searchTerm = $request->input('query');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('specialization', 'like', "%{$searchTerm}%")
                  ->orWhere('qualification', 'like', "%{$searchTerm}%")
                  ->orWhereHas('user', function ($userQuery) use ($searchTerm) {
                      $userQuery->where('name', 'like', "%{$searchTerm}%");
                  });
            });
        }

        // 2. Filter by Specific Specialization
        if ($request->filled('specialty')) {
            $query->where('specialization', 'like', "%{$request->input('specialty')}%");
        }

        // 3. Filter by Day of Week
        if ($request->filled('day')) {
            $query->whereHas('schedules', function ($scheduleQuery) use ($request) {
                $scheduleQuery->where('day_of_week', $request->input('day'))
                              ->where('is_active', true);
            });
        }

        $doctors = $query->latest()->paginate(9)->withQueryString();

        // Unique specializations for filter dropdown
        $specializations = Doctor::select('specialization')->distinct()->pluck('specialization');

        return view('doctors.index', compact('doctors', 'specializations'));

    }
}
