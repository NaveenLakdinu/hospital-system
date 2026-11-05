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

    /**
     * Store a newly created pharmacist in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'pharmacist',
        ]);

        return redirect()
            ->route('admin.pharmacists.index')
            ->with('success', 'Pharmacist onboarded and login account created successfully!');
    }

    /**
     * Remove the specified pharmacist account.
     */
    public function destroy(User $pharmacist)
    {
        if ($pharmacist->role !== 'pharmacist') {
            abort(403);
        }

        $pharmacist->delete();

        return redirect()
            ->route('admin.pharmacists.index')
            ->with('success', 'Pharmacist account removed successfully.');
    }

}
