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
                </table>
            </div>
        </div>
    </div>

    <!-- Right: Medicine Inventory -->
    <div class="col-lg-6">
        <div class="card card-modern p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-success-subtle text-success rounded-3 p-2">
                        <i class="bi bi-box-seam fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Medicine Inventory</h6>
                        <small class="text-muted">Manage your medicine stock</small>
                    </div>
                </div>
                <button class="btn btn-teal btn-sm rounded-3 px-3" data-bs-toggle="modal" data-bs-target="#addMedicineModal">
                    <i class="bi bi-plus-lg me-1"></i> Add Medicine
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle small">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Medicine Name</th>
                            <th>Stock Qty</th>
                            <th>Price (Rs.)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicines as $index => $med)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $med->name }}</td>
                            <td class="fw-bold">{{ $med->display_stock }}</td>
                            <td>{{ number_format($med->display_price, 2) }}</td>
                            <td>
                                @if($med->display_stock > 80)
                                    <span class="badge-instock">In Stock</span>
                                @else
                                    <span class="badge-lowstock">Low Stock</span>
                                @endif
                            </td>
                            <td class="d-flex gap-1">
                                <button class="btn btn-sm btn-outline-primary rounded-2" data-bs-toggle="modal" data-bs-target="#editMedModal{{ $med->id }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <form action="{{ route('pharmacy.inventory.destroy', $med->id) }}" method="POST" onsubmit="return confirm('Delete this medicine?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-2">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Medicine Modal -->
                        <div class="modal fade" id="editMedModal{{ $med->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 border-0">
                                    <form action="{{ route('pharmacy.inventory.update', $med->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h6 class="modal-title fw-bold">Edit Medicine</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body row g-3">
                                            <div class="col-12">
                                                <label class="form-label small fw-semibold">Medicine Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $med->name }}" required>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label small fw-semibold">Dosage Form</label>
                                                <input type="text" name="dosage_form" class="form-control" value="{{ $med->dosage_form ?? 'Tablets' }}" required>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label small fw-semibold">Stock Quantity</label>
                                                <input type="number" name="stock_qty" class="form-control" value="{{ $med->display_stock }}" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label small fw-semibold">Price (Rs.)</label>
                                                <input type="number" step="0.01" name="price" class="form-control" value="{{ $med->display_price }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-teal rounded-3">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Medicine Modal -->
<div class="modal fade" id="addMedicineModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <form action="{{ route('pharmacy.inventory.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-success-subtle">
                    <h6 class="modal-title fw-bold text-success">+ Add New Medicine</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-12">
                        <label class="form-label small fw-semibold">Medicine Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g., Cetirizine 10mg" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-semibold">Dosage Form *</label>
                        <select name="dosage_form" class="form-select">
                            <option value="Tablets">Tablets</option>
                            <option value="Capsules">Capsules</option>
                            <option value="Syrup">Syrup</option>
                            <option value="Injection">Injection</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-semibold">Stock Quantity *</label>
                        <input type="number" name="stock_qty" class="form-control" placeholder="100" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-semibold">Unit Price (Rs.) *</label>
                        <input type="number" step="0.01" name="price" class="form-control" placeholder="45.00" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border rounded-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-teal rounded-3 px-4">Add Medicine</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
</div>
@endsection