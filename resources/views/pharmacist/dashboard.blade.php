@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-1">Pharmacist Dashboard</h2>
    <p class="text-muted mb-4">Welcome, {{ Auth::user()->name }}</p>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">💊 Medicine Inventory</h5>
                    <p class="card-text text-muted">View and manage medicine stock.</p>
                    <a href="{{ route('pharmacist.medicines.index') }}" class="btn btn-primary">Go to Inventory</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">📋 Prescription Dispensing</h5>
                    <p class="card-text text-muted">View pending prescriptions and dispense medicines.</p>
                    <a href="{{ route('pharmacist.prescriptions.index') }}" class="btn btn-success">Go to Prescriptions</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
