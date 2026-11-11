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
   