@extends('layouts.pharmacy')

@section('content')
<div class="card card-modern p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="bg-info-subtle text-info rounded-3 p-3">
                <i class="bi bi-file-earmark-medical fs-4"></i>
            </div>
            <div>
                <h5 class="fw-bold mb-0">Doctor Received Medicine Notes</h5>
                <small class="text-muted">View prescriptions sent by doctors and issue medicines to patients</small>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Doctor Name</th>
                    <th>Patient</th>
                    <th>Medicine Details</th>
                    <th>Quantity</th>
                    <th>Received Date</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($receivedNotes as $index => $note)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-bold text-dark">{{ $note->doctor_name }}</td>
                    <td>{{ $note->patient_name }}</td>
                    <td class="fw-semibold text-primary">{{ $note->medicine_details }}</td>
                    <td class="fw-bold">{{ $note->quantity }}</td>
                    <td class="text-muted small">{{ $note->received_at->format('Y-m-d (h:i A)') }}</td>
                    <td>
                        @if($note->status === 'Received')
                            <span class="badge-received">Received</span>
                        @else
                            <span class="badge-issued">Issued</span>
                        @endif
                    </td>
                    <td class="text-end">
                        @if($note->status === 'Received')
                            <form action="{{ route('pharmacy.notes.issue', $note->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-teal btn-sm rounded-3 px-3">
                                    <i class="bi bi-check2-circle me-1"></i> Issue Medicine
                                </button>
                            </form>
                        @else
                            <span class="text-success small fw-semibold"><i class="bi bi-check-all"></i> Dispensed</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">No medicine notes received from doctors yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection