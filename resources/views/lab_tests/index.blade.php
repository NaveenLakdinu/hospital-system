@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container py-4">
    <!-- Title -->
    <h3 class="fw-bold mb-4 text-dark">Book Lab Tests Online</h3>

    
    <!-- How it works? Banner (Matching Image 1) -->
    <div class="card border-0 rounded-4 p-4 mb-5 text-center" style="background-color: #e8f1f5;">
        <h4 class="fw-bold text-dark mb-4">How it works?</h4>
        <div class="d-flex justify-content-center align-items-center gap-4">
            <div class="text-center">
                <i class="bi bi-box-seam fs-1 text-dark d-block"></i>
                <span class="fw-semibold text-secondary">Book test & Packages</span>
            </div>
            <div class="fs-3 text-secondary">➔</div>
            <div class="text-center">
                <i class="bi bi-file-earmark-medical fs-1 text-dark d-block"></i>
                <span class="fw-semibold text-secondary">Get report</span>
            </div>
        </div>
    </div>

    <!-- Find test by health concern (Matching Image 1) -->
    <h4 class="fw-bold mb-4 text-dark">Find test by health concern</h4>
    <div class="row row-cols-2 row-cols-md-6 g-4 text-center">
        <!-- Fever -->
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 hover-card cursor-pointer" onclick="openBooking('Fever Profile Test', 'Fever')" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <div class="bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 80px; height: 80px;">
                    <i class="bi bi-thermometer-high fs-1 text-danger"></i>
                </div>
                <span class="fw-bold text-dark">Fever</span>
            </div>
        </div>
        <!-- Diabetes -->
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 hover-card cursor-pointer" onclick="openBooking('Diabetes Blood Sugar Test', 'Diabetes')" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <div class="bg-info-subtle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 80px; height: 80px;">
                    <i class="bi bi-droplet-half fs-1 text-primary"></i>
                </div>
                <span class="fw-bold text-dark">Diabetes</span>
            </div>
        </div>
        <!-- Skin -->
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 hover-card cursor-pointer" onclick="openBooking('Skin Infection & Allergy Test', 'Skin')" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <div class="bg-purple-subtle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 80px; height: 80px; background-color: #e0d4f7;">
                    <i class="bi bi-person-fill-exclamation fs-1 text-purple" style="color: #6f42c1;"></i>
                </div>
                <span class="fw-bold text-dark">Skin</span>
            </div>
        </div>
        <!-- Kidney -->
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 hover-card cursor-pointer" onclick="openBooking('Kidney Function Test (KFT)', 'Kidney')" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 80px; height: 80px;">
                    <i class="bi bi-activity fs-1 text-warning"></i>
                </div>
                <span class="fw-bold text-dark">Kidney</span>
            </div>
        </div>
        <!-- Digestion -->
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 hover-card cursor-pointer" onclick="openBooking('Digestive System Profile', 'Digestion')" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 80px; height: 80px;">
                    <i class="bi bi-stomach fs-1 text-success"></i>
                </div>
                <span class="fw-bold text-dark">Digestion</span>
            </div>
        </div>
        <!-- Cancer -->
        <div class="col">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 hover-card cursor-pointer" onclick="openBooking('Cancer Screening Package', 'Cancer')" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <div class="bg-light-subtle border rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 80px; height: 80px;">
                    <i class="bi bi-ribbon fs-1 text-secondary"></i>
                </div>
                <span class="fw-bold text-dark">Cancer</span>
            </div>
        </div>
    </div>
</div>

<!-- Booking Modal Form -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <form action="{{ route('lab.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-bold" id="bookingModalLabel">Book Lab Test Online</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label text-muted fw-semibold">Category</label>
                        <input type="text" id="modal-category" name="category" class="form-control bg-light" readonly required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted fw-semibold">Lab Test Name</label>
                        <input type="text" id="modal-test-name" name="test_name" class="form-control" required placeholder="Enter or select test name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted fw-semibold">Preferred Booking Date</label>
                        <input type="date" name="booking_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Confirm Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script class="js">
function openBooking(testName, category) {
    document.getElementById('modal-test-name').value = testName;
    document.getElementById('modal-category').value = category;
}
function setTest(testName, category) {
    const searchVal = document.getElementById('search-input').value.trim();
    document.getElementById('modal-test-name').value = searchVal !== '' ? searchVal : testName;
    document.getElementById('modal-category').value = category;
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection