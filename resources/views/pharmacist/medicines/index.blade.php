@extends('layouts.app')

@section('content')
<!-- Bootstrap CSS CDN (Design එක හරියටම පෙන්වීමට) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-4">Pharmacy Medicine Inventory</h2>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Add Medicine Modal Button -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMedicineModal">
        + Add Medicine
    </button>

    <!-- Medicine Stock Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Medicine Name</th>
                        <th>Category</th>
                        <th>Stock Quantity</th>
                        <th>Unit Price (LKR)</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicines as $medicine)
                    <tr>
                        <td><strong>{{ $medicine->name }}</strong></td>
                        <td><span class="badge bg-secondary">{{ $medicine->category }}</span></td>
                        <td>
                            <span class="badge {{ $medicine->stock_quantity < 10 ? 'bg-danger' : 'bg-success' }}">
                                {{ $medicine->stock_quantity }}
                            </span>
                        </td>
                        <td>Rs. {{ number_format($medicine->unit_price, 2) }}</td>
                        <td>{{ $medicine->expiry_date }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No medicines found in the inventory.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Form: Add Medicine -->
<div class="modal fade" id="addMedicineModal" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pharmacist.medicines.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addMedicineModalLabel">Add New Medicine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Medicine Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Paracetamol 500mg" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select" required>
                            <option value="" selected disabled>Select Category</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Syrup">Syrup</option>
                            <option value="Capsule">Capsule</option>
                            <option value="Injection">Injection</option>
                            <option value="Ointment">Ointment</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock Quantity</label>
                        <input type="number" name="stock_quantity" class="form-control" min="0" placeholder="e.g. 100" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit Price (LKR)</label>
                        <input type="number" step="0.01" name="unit_price" class="form-control" min="0" placeholder="e.g. 15.00" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expiry Date</label>
                        <input type="date" name="expiry_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save Medicine</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection