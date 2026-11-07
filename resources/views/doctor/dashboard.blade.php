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
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #f8f9fa;
        }

        .waiting {
            color: #d58a00;
            font-weight: bold;
        }

        .completed {
            color: green;
            font-weight: bold;
        }

        .btn {
            background: #198754;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>

</head>

<body>

<div class="container">

    <h1>Doctor Dashboard</h1>

    <p class="subtitle">
        Today's Patient Queue
    </p>

@if(session('success'))
    <div style="
        background: #d1fae5;
        color: #065f46;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    ">
        {{ session('success') }}
    </div>
@endif

    <div class="card">

        <table>

            <thead>
               
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
            {{ $appointment->reason_for_visit }}
        </td>

        <td>
            <span class="{{ strtolower($appointment->status) }}">
                {{ ucfirst($appointment->status) }}
            </span>
        </td>

        <td>

            @if(in_array(strtolower($appointment->status), ['waiting', 'confirmed']))

                <a href="{{ route('doctor.consultation.show', $appointment->id) }}"
                   class="btn">
                    Start Consultation
                </a>

            @elseif(strtolower($appointment->status) == 'completed')

                Completed

            @else

                {{ ucfirst($appointment->status) }}

            @endif

        </td>

    </tr>

@empty

    <tr>
        <td colspan="5" style="text-align: center; padding: 30px;">
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