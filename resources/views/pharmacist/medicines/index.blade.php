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

@endcontent