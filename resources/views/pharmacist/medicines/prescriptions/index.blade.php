@extends('layouts.app')

@content

<div class="container mt-4">
    <h2>Prescription Dispensing Screen</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif