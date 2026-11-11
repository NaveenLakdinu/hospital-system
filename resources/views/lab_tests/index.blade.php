@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container py-4">
    <!-- Title -->
    <h3 class="fw-bold mb-4 text-dark">Book Lab Tests Online</h3>

    <!-- Search Bar Section (Matching Image 1) -->
    <div class="card border-0 shadow-sm rounded-pill p-2 mb-4 bg-light">
        <div class="row align-items-center g-2 px-3">
            <div class="col-md-3 d-flex align-items-center border-end">
                <i class="bi bi-geo-alt fs-5 text-secondary me-2"></i>
                <select class="form-select border-0 bg-transparent fw-semibold text-dark shadow-none">
                    <option selected>Sri Lanka</option>
                </select>
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <input type="text" id="search-input" class="form-control border-0 bg-transparent shadow-none" placeholder="Search for test (e.g. Full Blood Count, Sugar)...">
                    <span class="input-group-text border-0 bg-transparent"><i class="bi bi-search text-muted"></i></span>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-end gap-2">
                <button class="btn btn-primary rounded-pill px-4 fw-semibold" data-bs-toggle="modal" data-bs-target="#bookingModal" onclick="setTest('General Health Checkup', 'General')">
                    Online booking
                </button>
                <a href="https://wa.me/94771234567" target="_blank" class="btn btn-success rounded-pill px-3 d-flex align-items-center gap-2 fw-semibold" style="background-color: #00e676; border: none;">
                    Book Via What's app <i class="bi bi-telephone-fill"></i>
                </a>
            </div>
        </div>
    </div>
on-fill-exclamation fs-1 text-purple" style="color: #6f42c1;"></i>
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