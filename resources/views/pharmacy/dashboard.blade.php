@extends('layouts.pharmacy')

@section('content')
<!-- Top Row: Edit Profile & Pharmacy Information -->
<div class="row g-4 mb-4">
    <!-- Left: Edit Profile Card -->
    <div class="col-lg-8">
        <div class="card card-modern p-4 h-100">
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="bg-success-subtle text-success rounded-3 p-2">
                    <i class="bi bi-person-lines-fill fs-5"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-0">Edit Profile</h6>
                    <small class="text-muted">Keep your pharmacy information up to date.</small>
                </div>
            </div>

@extends('layouts.pharmacy')

@section('content')
<!-- Top Row: Edit Profile & Pharmacy Information -->
<div class="row g-4 mb-4">
    <!-- Left: Edit Profile Card -->
    <div class="col-lg-8">
        <div class="card card-modern p-4 h-100">
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="bg-success-subtle text-success rounded-3 p-2">
                    <i class="bi bi-person-lines-fill fs-5"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-0">Edit Profile</h6>
                    <small class="text-muted">Keep your pharmacy information up to date.</small>
                </div>
            </div>

            <form action="{{ route('pharmacy.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-md-3 text-center">
                        <div class="position-relative d-inline-block">
                            <img src="{{ $profile->avatar ? asset($profile->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($profile->pharmacy_name) . '&size=120&background=d1fae5&color=047857' }}" 
                                 class="rounded-circle border border-3 border-success-subtle object-fit-cover" width="110" height="110" alt="Pharmacy Avatar">
                            <label for="avatarUpload" class="btn btn-teal btn-sm rounded-circle position-absolute bottom-0 end-0 shadow" style="cursor: pointer;">
                                <i class="bi bi-camera-fill"></i>
                            </label>
                            <input type="file" id="avatarUpload" name="avatar" class="d-none" accept="image/*">
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Pharmacy Name <span class="text-danger">*</span></label>
                                <input type="text" name="pharmacy_name" class="form-control rounded-3" value="{{ $profile->pharmacy_name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Contact Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-telephone text-success"></i></span>
                                    <input type="text" name="contact_number" class="form-control rounded-end-3" value="{{ $profile->contact_number }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control rounded-3" value="{{ $profile->address }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope text-success"></i></span>
                                    <input type="email" name="email" class="form-control rounded-end-3" value="{{ $profile->email }}" required>
                                </div>
                            </div>
                            <div class="col-12 d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-teal rounded-3 px-4">
                                    <i class="bi bi-check2-square me-1"></i> Update Profile
                                </button>
                                <a href="{{ route('pharmacy.dashboard') }}" class="btn btn-light border rounded-3 px-4">
                                    <i class="bi bi-x-lg me-1"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Right: Pharmacy Information Summary Card -->
    <div class="col-lg-4">
        <div class="info-summary-card p-4 h-100 d-flex flex-column justify-content-center">
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="text-white rounded-3 p-2" style="background-color: #10b981;">
                    <i class="bi bi-shop fs-5"></i>
                </div>
                <h6 class="fw-bold mb-0 text-dark">Pharmacy Information</h6>
            </div>

            <div class="d-flex align-items-start gap-3 mb-3">
                <div class="bg-white text-success rounded-circle p-2 shadow-sm">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div>
                    <div class="fw-bold text-dark">{{ $profile->pharmacy_name }}</div>
                    <small class="text-secondary">{{ $profile->address }}</small>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="bg-white text-success rounded-circle p-2 shadow-sm">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <div class="fw-semibold text-dark small">{{ $profile->contact_number }}</div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="bg-white text-success rounded-circle p-2 shadow-sm">
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="fw-semibold text-dark small">{{ $profile->email }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Row: Doctor Received Medicine Notes & Medicine Inventory -->
<div class="row g-4">
    <!-- Left: Doctor Received Medicine Notes -->
    <div class="col-lg-6">
        <div class="card card-modern p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-info-subtle text-info rounded-3 p-2">
                        <i class="bi bi-file-earmark-medical fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Doctor Received Medicine Notes</h6>
                        <small class="text-muted">View medicines received from doctors</small>
                    </div>
                </div>
                <a href="{{ route('pharmacy.notes.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                    <i class="bi bi-calendar3 me-1"></i> View All
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle small">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Doctor Name</th>
                            <th>Medicine Details</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receivedNotes as $index => $note)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $note->doctor_name }}</td>
                            <td>{{ $note->medicine_details }}</td>
                            <td class="fw-bold">{{ $note->quantity }}</td>
                            <td class="text-muted" style="font-size: 11px;">{{ $note->received_at->format('Y-m-d (h:i A)') }}</td>
                            <td>
                                @if($note->status === 'Received')
                                    <span class="badge-received">Received</span>
                                @else
                                    <span class="badge-issued">Issued</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#noteModal{{ $note->id }}" title="View & Issue">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- View & Issue Medicine Modal -->
                        <div class="modal fade" id="noteModal{{ $note->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 border-0">
                                    <div class="modal-header bg-success-subtle">
                                        <h6 class="modal-title fw-bold text-success">Doctor Medicine Note Details</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="mb-2"><strong>Doctor:</strong> {{ $note->doctor_name }}</p>
                                        <p class="mb-2"><strong>Patient:</strong> {{ $note->patient_name }}</p>
                                        <p class="mb-2"><strong>Medicine:</strong> {{ $note->medicine_details }}</p>
                                        <p class="mb-2"><strong>Quantity:</strong> {{ $note->quantity }}</p>
                                        <p class="mb-2"><strong>Instructions:</strong> {{ $note->instructions ?? 'As prescribed by doctor' }}</p>
                                        <p class="mb-0"><strong>Status:</strong> {{ $note->status }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        @if($note->status === 'Received')
                                            <form action="{{ route('pharmacy.notes.issue', $note->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-teal rounded-3">
                                                    <i class="bi bi-check2-circle me-1"></i> Issue Medicine Now
                                                </button>
                                            </form>
                                        @endif
                                        <button type="button" class="btn btn-light border rounded-3" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>

</div>
@endsection