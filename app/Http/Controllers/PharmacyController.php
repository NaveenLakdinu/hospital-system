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

    // 1. Main Pharmacy Admin Panel Dashboard
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
        ]);

        $profile = $this->getProfile();

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

    // 4. Medicine Inventory Page
    public function inventory()
    {
        $medicines = Medicine::orderBy('id', 'asc')->get();
        return view('pharmacy.inventory', compact('medicines'));
    }

    // 5. Add New Medicine
    public function storeMedicine(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dosage_form' => 'required|string|max:100',
            'stock_qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Medicine::create([
            'name' => $request->name,
            'category' => $request->dosage_form,
            'dosage_form' => $request->dosage_form,
            'stock_qty' => $request->stock_qty,
            'stock_quantity' => $request->stock_qty,
            'price' => $request->price,
            'unit_price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'New medicine added to inventory!');
    }

    // 6. Update Medicine (Edit Button)
    public function updateMedicine(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dosage_form' => 'required|string|max:100',
            'stock_qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->update([
            'name' => $request->name,
            'dosage_form' => $request->dosage_form,
            'stock_qty' => $request->stock_qty,
            'stock_quantity' => $request->stock_qty,
            'price' => $request->price,
            'unit_price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Medicine updated successfully!');
    }

    // 7. Delete Medicine (Delete Button)
    public function destroyMedicine($id)
    {
        try {
            Medicine::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Medicine deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cannot delete this medicine because it is linked to existing patient records.');
        }
    }

    // 8. Received Notes Page (Sidebar එකේ Received Notes click කළ විට)
    public function receivedNotes()
    {
        $receivedNotes = DoctorMedicineNote::orderBy('received_at', 'desc')->get();
        return view('pharmacy.received-notes', compact('receivedNotes'));
    }

    // 9. Issue Medicine (Doctor එවූ බෙහෙත් Issue කිරීම)
    public function issueMedicineNote($id)
    {
        $note = DoctorMedicineNote::findOrFail($id);
        $note->update(['status' => 'Issued']);

        // Inventory Stock එකෙන් අදාළ බෙහෙත් ප්‍රමාණය අඩු කිරීම
        $medicineName = trim(explode('(', $note->medicine_details)[0]);
        $medicine = Medicine::where('name', 'LIKE', '%' . $medicineName . '%')->first();
        
        if ($medicine) {
            $currentStock = $medicine->display_stock;
            $newStock = max(0, $currentStock - $note->quantity);
            $medicine->update([
                'stock_qty' => $newStock,
                'stock_quantity' => $newStock,
            ]);
        }

        return redirect()->back()->with('success', 'Medicine issued to patient & stock updated!');
    }

    // 10. Doctor Records
    public function doctorRecords()
    {
        $doctors = DoctorMedicineNote::select('doctor_name')
            ->selectRaw('COUNT(*) as total_prescriptions')
            ->selectRaw('SUM(quantity) as total_units')
            ->groupBy('doctor_name')
            ->get();

        return view('pharmacy.doctor-records', compact('doctors'));
    }

    // 11. Reports
    public function reports()
    {
        $totalMedicines = Medicine::count();
        $lowStockCount = Medicine::where('stock_qty', '<=', 80)->count();
        $totalIssued = DoctorMedicineNote::where('status', 'Issued')->count();
        $pendingNotes = DoctorMedicineNote::where('status', 'Received')->count();

        return view('pharmacy.reports', compact('totalMedicines', 'lowStockCount', 'totalIssued', 'pendingNotes'));
    }
}