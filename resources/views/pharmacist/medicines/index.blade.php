@extends('layouts.app')

@content
<div class="container mt-4">
    <h2>Pharmacy Medicine Inventory</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMedicineModal">
        + Add Medicine
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Stock Quantity</th>
                <th>Unit Price</th>
                <th>Expiry Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicines as $medicine)
            <tr>
                <td>{{ $medicine->name }}</td>
                <td>{{ $medicine->category }}</td>
                <td>{{ $medicine->stock_quantity }}</td>
                <td>{{ $medicine->unit_price }}</td>
                <td>{{ $medicine->expiry_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="addMedicineModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pharmacist.medicines.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Medicine</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Tablet/Syrup" required>
                    </div>
                    <div class="mb-3">
                        <label>Stock Quantity</label>
                        <input type="number" name="stock_quantity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Unit Price</label>
                        <input type="number" step="0.01" name="unit_price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Expiry Date</label>
                        <input type="date" name="expiry_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endcontent