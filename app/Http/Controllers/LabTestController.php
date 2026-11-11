<?php

namespace App\Http\Controllers;

use App\Models\LabTestBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LabTestController extends Controller
{
    // 1. Lab Tests Online Main Page (UI Page matching reference design)
    public function index()
    {
        return view('lab_tests.index');
    }

    // 2. Booking එක Database එකට Save කිරීම
    public function store(Request $request)
    {
        $request->validate([
            'test_name' => 'required|string',
            'category' => 'required|string',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $refNo = 'LAB-' . strtoupper(uniqid());

        LabTestBooking::create([
            'user_id' => Auth::id(),
            'reference_no' => $refNo,
            'test_name' => $request->test_name,
            'category' => $request->category,
            'booking_date' => $request->booking_date,
            'status' => 'Confirmed',
        ]);

        return redirect()->route('lab.my_bookings')->with('success', 'Lab Test booked successfully! Ref No: ' . $refNo);
    }

    // 3. User Book කළ Lab Tests ලැයිස්තුව පෙන්වීම
    public function myBookings()
    {
        $bookings = LabTestBooking::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('lab_tests.my_bookings', compact('bookings'));
    }

    // 4. Lab Test Booking එක Cancel කිරීම
    public function cancel($id)
    {
        $booking = LabTestBooking::where('user_id', Auth::id())->findOrFail($id);
        $booking->update(['status' => 'Cancelled']);

        return redirect()->back()->with('success', 'Lab Test booking cancelled successfully.');
    }
}