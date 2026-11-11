@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">My Lab Test Bookings</h3>
        <a href="{{ route('lab.index') }}" class="btn btn-primary rounded-pill px-4">+ Book New Test</a>
    </div>

 