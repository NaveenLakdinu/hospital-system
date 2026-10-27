<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $doctors = Doctor::has('user')
            ->with(['user', 'schedules'])
            ->latest()
            ->paginate(10);

        return view('admin.doctors.index', compact('doctors'));
    }
}
