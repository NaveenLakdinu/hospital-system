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
    public function dispense($id)
    {
        DB::transaction(function () use ($id) {
            $prescription = Prescription::with('items.medicine')->findOrFail($id);

            foreach ($prescription->items as $item) {
                $medicine = $item->medicine;

                if ($medicine->stock_quantity >= $item->quantity) {
                    $medicine->decrement('stock_quantity', $item->quantity);
                } else {
                    throw new \Exception("Stock insufficient for " . $medicine->name);
                }
            }

            $prescription->update(['status' => 'fulfilled']);
        });

        return redirect()->back()->with('success', 'Prescription dispensed and stock updated successfully!');
    }
}
