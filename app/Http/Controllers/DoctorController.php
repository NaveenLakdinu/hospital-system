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
        $query = Doctor::with(['user', 'schedules' => function ($q) {
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





    }
}
