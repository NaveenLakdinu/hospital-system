<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vital Signs Summary</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .info {
            background: #eef8f7;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .vitals {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            background: #198754;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    @if(session('success'))
        <div class="success">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <h1>Vital Signs Summary</h1>

        <div class="info">

            <p>
                <strong>Patient:</strong>
                {{ $appointment->patient->name }}
            </p>

            <p>
                <strong>Doctor:</strong>
                {{ $appointment->doctor->user->name }}
            </p>

            <p>
                <strong>Reason:</strong>
                {{ $appointment->reason_for_visit }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ ucfirst($appointment->status) }}
            </p>

        </div>

        <div class="vitals">

            <h3>Recorded Vital Signs</h3>

            <p>
                <strong>Temperature:</strong>
                {{ $appointment->vitalSign->temperature }} °C
            </p>

            <p>
                <strong>Blood Pressure:</strong>
                {{ $appointment->vitalSign->systolic_bp }}
                /
                {{ $appointment->vitalSign->diastolic_bp }}
                mmHg
            </p>

            <p>
                <strong>Pulse:</strong>
                {{ $appointment->vitalSign->pulse }} bpm
            </p>

            <p>
                <strong>Weight:</strong>
                {{ $appointment->vitalSign->weight }} kg
            </p>

            <p>
                <strong>Recorded By:</strong>
                {{ $appointment->vitalSign->nurse->name }}
            </p>

        </div>

        <a
            href="{{ route('nurse.dashboard') }}"
            class="btn"
        >
            Back to Nurse Dashboard
        </a>

    </div>

</div>

</body>
</html>