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
.btn-delete {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    width: 40px;
    height: 40px;

    background: #fff;
    color: #dc3545;

    border: 1px solid #dc3545;
    border-radius: 8px;

    cursor: pointer;
    margin-left: 8px;

    transition: 0.2s ease;
}

.btn-delete:hover {
    background: #dc3545;
    color: #fff;
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

    @if(strtolower($appointment->status) === 'confirmed')

        <a
            href="{{ route('nurse.vitals.create', $appointment->id) }}"
            class="btn"
        >
            Add Vitals
        </a>

    @elseif(
        in_array(strtolower($appointment->status), ['waiting', 'completed'])
        && $appointment->vitalSign
    )

        <a
            href="{{ route('nurse.vitals.summary', $appointment->id) }}"
            class="btn"
        >
            View Summary
        </a>

        @if(strtolower($appointment->status) === 'waiting')

            <form
                method="POST"
                action="{{ route('nurse.vitals.destroy', $appointment->id) }}"
                style="display:inline;"
                onsubmit="return confirm('Are you sure you want to delete these vital signs?');"
            >
                @csrf
                @method('DELETE')

               <button
    type="submit"
    class="btn-delete"
    title="Delete Vitals"
    aria-label="Delete Vitals"
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
        <polyline points="3 6 5 6 21 6"></polyline>
        <path d="M19 6l-1 14H6L5 6"></path>
        <path d="M10 11v6"></path>
        <path d="M14 11v6"></path>
        <path d="M9 6V4h6v2"></path>
    </svg>
</button>
            </form>

        @endif

    @else

        {{ ucfirst($appointment->status) }}

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