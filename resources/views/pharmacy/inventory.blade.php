@extends('layouts.pharmacy')

@section('content')
<div class="card card-modern p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-success-subtle text-success rounded-3 p-3">
                <i class="bi bi-capsule fs-4"></i>
            </div>
            <div>
                <h5 class="fw-bold mb-0">Medicine Inventory Management</h5>
                <small class="text-muted">Add, update, or remove medicine stock and pricing</small>
            </div>
        </div>
        <button class="btn btn-teal rounded-3 px-4" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
            <i class="bi bi-plus-lg me-1"></i> Add Medicine
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Medicine Name</th>
                    <th>Form</th>
                    <th>Stock Qty</th>
                    <th>Price (Rs.)</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicines as $index => $med)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-bold">{{ $med->name }}</td>
                    <td><span class="badge bg-light text-dark border">{{ $med->dosage_form ?? 'Tablets' }}</span></td>
                    <td class="fw-bold">{{ $med->display_stock }}</td>
                    <td>Rs. {{ number_format($med->display_price, 2) }}</td>
                    <td>
                        @if($med->display_stock > 80)
                            <span class="badge-instock">In Stock</span>
                        @else
                            <span class="badge-lowstock">Low Stock</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-primary rounded-2 me-1" data-bs-toggle="modal" data-bs-target="#editInvModal{{ $med->id }}">
                            <i class="bi bi-pencil-fill"></i> Edit
                        </button>
                        <form action="{{ route('pharmacy.inventory.destroy', $med->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this medicine?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-2">
                                <i class="bi bi-trash-fill"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editInvModal{{ $med->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-4 border-0">
                            <form action="{{ route('pharmacy.inventory.update', $med->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h6 class="modal-title fw-bold">Update Medicine Stock</h6>
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
                                        <label class="form-label small fw-semibold">Stock Qty</label>
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

<!-- Add Modal -->
<div class="modal fade" id="addInventoryModal" tabindex="-1">
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
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-semibold">Form *</label>
                        <select name="dosage_form" class="form-select">
                            <option value="Tablets">Tablets</option>
                            <option value="Capsules">Capsules</option>
                            <option value="Syrup">Syrup</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-semibold">Stock Qty *</label>
                        <input type="number" name="stock_qty" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-semibold">Price (Rs.) *</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-teal rounded-3">Save Medicine</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

  