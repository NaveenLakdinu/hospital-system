@extends('layouts.app')

@content
<div class="container mt-4">
    <h2>Prescription Dispensing Screen</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($prescriptions as $prescription)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Prescription #{{ $prescription->id }} - Patient: {{ $prescription->patient->name }}
                    </div>
                    <div class="card-body">
                        <p>Doctor: Dr. {{ $prescription->doctor->name }}</p>
                        <ul>
                            @foreach($prescription->items as $item)
                                <li>{{ $item->medicine->name }} - {{ $item->quantity }} units</li>
                            @endforeach
                        </ul>
                        <form action="{{ route('pharmacist.prescriptions.dispense', $prescription->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">Dispense / Mark as Fulfilled</button>
                        </form>
                    </div>
                </div>
            </div>
            
        @empty
            <div class="col-12"><div class="alert alert-info">No pending prescriptions.</div></div>
        @endforelse
    </div>
</div>
@endcontent