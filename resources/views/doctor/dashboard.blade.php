<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            color: #1f2937;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        }

        /* Header */

        .dashboard-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .dashboard-title h1 {
            margin: 0 0 8px;
            font-size: 32px;
        }

        .subtitle {
            color: #666;
            margin: 0;
        }

        .profile-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #eef8f4;
            color: #198754;

            padding: 10px 16px;

            border: 1px solid #cdeadd;
            border-radius: 9px;

            text-decoration: none;
            font-weight: 600;

            transition: 0.2s ease;
        }

        .profile-btn:hover {
            background: #198754;
            color: white;
        }

        /* Success Message */

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Table */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #eef8f7;
            font-weight: 700;
        }

        /* Status */

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

        .waiting-nurse {
            color: #6c757d;
            font-weight: 600;
        }

        /* Buttons */

        .btn {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 9px 15px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
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

        /* Delete button */

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

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        /* Mobile */

        @media(max-width: 700px) {

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .card {
                padding: 20px;
                overflow-x: auto;
            }

            table {
                min-width: 750px;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <!-- Dashboard Header -->

        <div class="dashboard-header">

            <div class="dashboard-title">

                <h1>
                    Doctor Dashboard
                </h1>

                <p class="subtitle">
                    Patient Queue
                </p>

            </div>


            <!-- My Profile Button -->

            <a
                href="{{ route('doctor.profile') }}"
                class="profile-btn"
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
                    <path d="M20 21a8 8 0 0 0-16 0"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>

                My Profile

            </a>

        </div>


        <!-- Success Message -->

        @if(session('success'))

            <div class="success">
                ✅ {{ session('success') }}
            </div>

        @endif


        <!-- Patient Queue -->

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

                    <!-- Token -->

                    <td>
                        #{{ $appointment->token_number }}
                    </td>


                    <!-- Patient -->

                    <td>
                        {{ $appointment->patient?->name ?? 'Unknown Patient' }}
                    </td>


                    <!-- Reason -->

                    <td>
                        {{ $appointment->reason_for_visit }}
                    </td>


                    <!-- Status -->

                    <td>

                        <span class="status {{ strtolower($appointment->status) }}">

                            {{ ucfirst($appointment->status) }}

                        </span>

                    </td>


                    <!-- Actions -->

                    <td>

                        {{-- Confirmed = Waiting for Nurse --}}

                        @if(strtolower($appointment->status) === 'confirmed')

                            <span class="waiting-nurse">
                                Waiting for Nurse Check
                            </span>


                        {{-- Waiting = Nurse completed vitals --}}

                        @elseif(strtolower($appointment->status) === 'waiting')

                            <a
                                href="{{ route('doctor.consultation.show', $appointment->id) }}"
                                class="btn"
                            >
                                Start Consultation
                            </a>


                        {{-- Completed + Prescription --}}

                        @elseif(
                            strtolower($appointment->status) === 'completed'
                            && $appointment->prescription
                        )

                            <div class="action-buttons">

                                <!-- View Summary -->

                                <a
                                    href="{{ route(
                                        'doctor.prescription.summary',
                                        $appointment->prescription->id
                                    ) }}"
                                    class="btn"
                                >
                                    View Summary
                                </a>


                                <!-- Delete Consultation -->

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


                        {{-- Completed but no prescription --}}

                        @elseif(strtolower($appointment->status) === 'completed')

                            Completed


                        {{-- Other status --}}

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