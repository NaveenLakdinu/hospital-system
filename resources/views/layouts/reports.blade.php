@extends('layouts.pharmacy')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-modern p-4">
            <small class="text-muted fw-semibold">Total Medicines</small>
            <h3 class="fw-bold text-dark mt-1 mb-0">{{ $totalMedicines }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4">
            <small class="text-muted fw-semibold">Low Stock Alerts</small>
            <h3 class="fw-bold text-warning mt-1 mb-0">{{ $lowStockCount }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4">
            <small class="text-muted fw-semibold">Issued Prescriptions</small>
            <h3 class="fw-bold text-success mt-1 mb-0">{{ $totalIssued }}</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4">
            <small class="text-muted fw-semibold">Pending Doctor Notes</small>
            <h3 class="fw-bold text-primary mt-1 mb-0">{{ $pendingNotes }}</h3>
        </div>
    </div>
</div>
@endsection