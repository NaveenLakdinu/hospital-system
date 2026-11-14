<?php

namespace App\Http\Controllers;

use App\Models\PharmacyProfile;
use App\Models\Medicine;
use App\Models\DoctorMedicineNote;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
private function getProfile()
    {
        return PharmacyProfile::firstOrCreate(
            ['id' => 1],
            [
                'pharmacy_name' => 'MediCare Pharmacy',
                'contact_number' => '0771234567',
                'address' => 'No. 123, Health Avenue, Colombo 07',
                'email' => 'pharmacy@medicare.lk',
            ]
        );
    }

    public function dashboard()
    {
        $profile = $this->getProfile();
        $receivedNotes = DoctorMedicineNote::orderBy('received_at', 'desc')->get();
        $medicines = Medicine::orderBy('id', 'asc')->get();

        return view('pharmacy.dashboard', compact('profile', 'receivedNotes', 'medicines'));
    }

    // 2. Edit Profile Page (Sidebar එකේ Edit Profile click කළ විට)
    public function editProfile()
    {
        $profile = $this->getProfile();
        return view('pharmacy.edit-profile', compact('profile'));
    }

    // 3. Update Profile Action
    public function updateProfile(Request $request)
    {
        $request->validate([
            'pharmacy_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:25',
            'address' => 'required|string|max:500',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);$profile = $this->getProfile();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = 'pharmacy_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/pharmacy'), $filename);
            $profile->avatar = 'uploads/pharmacy/' . $filename;
        }

        $profile->update([
            'pharmacy_name' => $request->pharmacy_name,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Pharmacy profile updated successfully!');
    }

    // 4. Medicine