<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with(['patient', 'doctor', 'items.medicine'])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('pharmacist.prescriptions.index', compact('prescriptions'));
    }
}
