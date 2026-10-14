@extends('layouts.app')

@content

<div class="container mt-4">
    <h2>Prescription Dispensing Screen</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($prescriptions as $prescription)
            <div class="col-md-6 mb-3">
                <div class="card">