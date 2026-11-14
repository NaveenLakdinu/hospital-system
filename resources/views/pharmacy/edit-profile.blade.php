@extends('layouts.pharmacy')

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card card-modern p-4">
            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                <div class="bg-success-subtle text-success rounded-3 p-3">
                    <i class="bi bi-person-gear fs-4"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-0">Edit Pharmacy Profile</h5>
                    <small class="text-muted">Update your pharmacy contact details, address, and profile logo.</small>
                </div>
            </div>

            <form action="{{ route('pharmacy.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4 align-items-center">
                    <div class="col-md-4 text-center">
                        <div class="position-relative d-inline-block mb-2">
                            <img src="{{ $profile->avatar ? asset($profile->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($profile->pharmacy_name) . '&size=150&background=d1fae5&color=047857' }}" 
                                 class="rounded-circle border border-4 border-success-subtle object-fit-cover shadow-sm" width="140" height="140" alt="Pharmacy Logo">
                            <label for="profileAvatarInput" class="btn btn-teal rounded-circle position-absolute bottom-0 end-0 shadow" style="cursor: pointer;">
                                <i class="bi bi-camera-fill"></i>
                            </label>
                            <input type="file" id="profileAvatarInput" name="avatar" class="d-none" accept="image/*">
                        </div>
                        <small class="text-muted d-block">Click camera icon to change logo</small>
                    </div>

                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Pharmacy Name <span class="text-danger">*</span></label>
                                <input type="text" name="pharmacy_name" class="form-control form-control-lg rounded-3" value="{{ $profile->pharmacy_name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Contact Number <span class="text-danger">*</span></label>
                                <input type="text" name="contact_number" class="form-control rounded-3" value="{{ $profile->contact_number }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control rounded-3" value="{{ $profile->email }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Pharmacy Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control rounded-3" rows="3" required>{{ $profile->address }}</textarea>
                            </div>
                            <div class="col-12 d-flex gap-2 pt-2">
                                <button type="submit" class="btn btn-teal rounded-3 px-4 py-2">
                                    <i class="bi bi-check2-circle me-1"></i> Update Profile
                                </button>
                                <a href="{{ route('pharmacy.dashboard') }}" class="btn btn-light border rounded-3 px-4 py-2">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="info-summary-card p-4 h-100">
            <div class="d-flex align-items-center gap-2 mb-4">
                <div class="text-white rounded-3 p-2" style="background-color: #10b981;">
                    <i class="bi bi-shop fs-5"></i>
                </div>
                <h5 class="fw-bold mb-0 text-dark">Pharmacy Information</h5>
            </div>

            <div class="d-flex align-items-start gap-3 mb-4">
                <div class="bg-white text-success rounded-circle p-2 shadow-sm">
                    <i class="bi bi-geo-alt-fill fs-5"></i>
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-1">{{ $profile->pharmacy_name }}</h6>
                    <p class="text-secondary small mb-0">{{ $profile->address }}</p>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="bg-white text-success rounded-circle p-2 shadow-sm">
                    <i class="bi bi-telephone-fill fs-5"></i>
                </div>
                <span class="fw-bold text-dark">{{ $profile->contact_number }}</span>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="bg-white text-success rounded-circle p-2 shadow-sm">
                    <i class="bi bi-envelope-fill fs-5"></i>
                </div>
                <span class="fw-bold text-dark">{{ $profile->email }}</span>
            </div>
        </div>
    </div>
</div>
@endsection