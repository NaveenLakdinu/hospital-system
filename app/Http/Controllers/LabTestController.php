<?php

namespace App\Http\Controllers;

use App\Models\LabTestBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LabTestController extends Controller
{
    // Lab Tests Main Page
    public function index()
    {
        return view('lab_tests.index');
    }

    // Store Lab Test Booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $refNo = 'LAB-' . strtoupper(Str::random(8));

        LabTestBooking::create([
            'user_id' => Auth::id(),
            'reference_no' => $refNo,
            'test_name' => $validated['test_name'],
            'category' => $validated['category'],
            'booking_date' => $validated['booking_date'],
            'status' => 'Confirmed',
        ]);

        return redirect()
            ->route('lab.my_bookings')
            ->with('success', 'Lab Test booked successfully! Ref No: ' . $refNo);
    }

    // 
    public function myBookings()
    {
        $bookings = LabTestBooking::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('lab_tests.my_bookings', compact('bookings'));
    }

    // Cancel Booking
    public function cancel($id)
    {
        $booking = LabTestBooking::where('user_id', Auth::id())
            ->findOrFail($id);

        $booking->update([
            'status' => 'Cancelled'
        ]);

        return redirect()
            ->back()
            ->with('success', 'Lab Test booking cancelled successfully.');
    }
}
