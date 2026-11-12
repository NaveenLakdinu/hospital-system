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
            max-width: 1100px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        h1 {
            margin-bottom: 10px;
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
                </tr>
            </thead>

            <tbody>

            @forelse($appointments as $appointment)

                <tr>

                    <td>
                        #{{ $appointment->token_number }}
                    </td>

                    <td>
                        {{ $appointment->patient->name }}
                    </td>

                    <td>
                        {{ $appointment->doctor->user->name }}
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

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="empty">
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