<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    /**
     * Display a listing of all pharmacists.
     */
    public function index()
    {
        $pharmacists = User::where('role', 'pharmacist')
            ->latest()
            ->paginate(10);

        return view('admin.pharmacists.index', compact('pharmacists'));
    }

    /**
     * Show the form for onboarding a new pharmacist.
     */
    public function create()
    {
        return view('admin.pharmacists.create');
    }
}
