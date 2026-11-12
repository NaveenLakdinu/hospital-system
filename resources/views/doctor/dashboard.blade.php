<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #eef8f7;
        }

        .status {
            font-weight: bold;
        }

        .pending {
            color: #6c757d;
        }

        .confirmed {
            color: #0d6efd;
        }

        .waiting {
            color: #fd7e14;
        }

        .completed {
            color: #198754;
        }

        .cancelled {
            color: #dc3545;
        }

        .btn {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 9px 15px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #157347;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-buttons form {
            margin: 0;
        }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 40px;
            height: 40px;

            background: white;
            color: #dc3545;

            border: 1px solid #dc3545;
            border-radius: 8px;

            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-delete:hover {
            background: #dc3545;
            color: white;
        }

        .waiting-nurse {
            color: #6c757d;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }
    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Doctor Dashboard</h1>

        <p class="subtitle">
            Patient Queue
        </p>

        @if(session('success'))
            <div class="success">
                ✅ {{ session('success') }}
            </div>
        @endif

        <table>

            <thead>

                <tr>
                    <th>Token</th>
                    <th>Patient</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($appointments as $appointment)

                <tr>

                    <td>
                        #{{ $appointment->token_number }}
                    </td>


                    <td>
                        {{ $appointment->patient?->name ?? 'Unknown Patient' }}
                    </td>


                    <td>
                        {{ $appointment->reason_for_visit }}
                    </td>


                    <td>

                        <span class="status {{ strtolower($appointment->status) }}">

                            {{ ucfirst($appointment->status) }}

                        </span>

                    </td>


                    <td>

                        {{-- Nurse has not checked vital signs yet --}}
                        @if(strtolower($appointment->status) === 'confirmed')

                            <span class="waiting-nurse">
                                Waiting for Nurse Check
                            </span>


                        {{-- Nurse completed vital signs --}}
                        @elseif(strtolower($appointment->status) === 'waiting')

                            <a
                                href="{{ route('doctor.consultation.show', $appointment->id) }}"
                                class="btn"
                            >
                                Start Consultation
                            </a>


                        {{-- Doctor completed consultation and prescription --}}
                        @elseif(
                            strtolower($appointment->status) === 'completed'
                            && $appointment->prescription
                        )

                            <div class="action-buttons">

                                <a
                                    href="{{ route(
                                        'doctor.prescription.summary',
                                        $appointment->prescription->id
                                    ) }}"
                                    class="btn"
                                >
                                    View Summary
                                </a>


                                <form
                                    method="POST"
                                    action="{{ route(
                                        'doctor.consultation.destroy',
                                        $appointment->id
                                    ) }}"
                                    onsubmit="return confirm(
                                        'Are you sure you want to delete this consultation and prescription?'
                                    );"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-delete"
                                        title="Delete Consultation"
                                        aria-label="Delete Consultation"
                                    >

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >

                                            <polyline
                                                points="3 6 5 6 21 6"
                                            ></polyline>

                                            <path
                                                d="M19 6l-1 14H6L5 6"
                                            ></path>

                                            <path
                                                d="M10 11v6"
                                            ></path>

                                            <path
                                                d="M14 11v6"
                                            ></path>

                                            <path
                                                d="M9 6V4h6v2"
                                            ></path>

                                        </svg>

                                    </button>

                                </form>

                            </div>


                        @elseif(strtolower($appointment->status) === 'completed')

                            Completed


                        @else

                            {{ ucfirst($appointment->status) }}

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="empty">
                        No appointments available.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>