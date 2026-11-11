@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">My Lab Test Bookings</h3>
        <a href="{{ route('lab.index') }}" class="btn btn-primary rounded-pill px-4">+ Book New Test</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Reference No</th>
                        <th>Category</th>
                        <th>Test Name</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td class="ps-4"><span class="badge bg-primary fs-6">{{ $booking->reference_no }}</span></td>
                        <td><span class="badge bg-secondary">{{ $booking->category }}</span></td>
                        <td class="fw-bold">{{ $booking->test_name }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>
                            @if($booking->status === 'Confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @else
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
