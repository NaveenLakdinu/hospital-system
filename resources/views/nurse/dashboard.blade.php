<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nurse Dashboard</title>

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
            margin-bottom: 5px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
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
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
        }

        .btn:hover {
            background: #157347;
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

        <h1>Nurse Dashboard</h1>

        <p class="subtitle">
            Today's Patient Queue
        </p>

        <table>

            <thead>
                <tr>
                    <th>Token</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Time</th>
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
                        {{ $appointment->doctor?->user?->name ?? 'Unknown Doctor' }}
                    </td>

                    <td>
                        {{ $appointment->appointment_time }}
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

                        @if(strtolower($appointment->status) !== 'completed')

                            <a
                                href="{{ route('nurse.vitals.create', $appointment->id) }}"
                                class="btn"
                            >
                                Add Vitals
                            </a>

                        @else

                            Completed

                        @endif

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="empty">
                        No appointments available for today.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>