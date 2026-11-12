<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Record Vital Signs</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        .patient-info {
            background: #eef8f7;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .btn {
            background: #198754;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #198754;
        }

        .error {
            color: red;
            margin-top: -15px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('nurse.dashboard') }}" class="back">
        ← Back to Dashboard
    </a>

    <div class="card">

        <h1>Record Vital Signs</h1>

        <div class="patient-info">

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

        </div>

        <form
            method="POST"
            action="{{ route('nurse.vitals.store', $appointment->id) }}"
        >

            @csrf

            <label>Temperature (°C)</label>

            <input
                type="number"
                step="0.1"
                name="temperature"
                value="{{ old('temperature', $appointment->vitalSign?->temperature) }}"
                placeholder="Example: 37.2"
                required
            >

            @error('temperature')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Systolic Blood Pressure</label>

            <input
                type="number"
                name="systolic_bp"
                value="{{ old('systolic_bp', $appointment->vitalSign?->systolic_bp) }}"
                placeholder="Example: 120"
                required
            >


            <label>Diastolic Blood Pressure</label>

            <input
                type="number"
                name="diastolic_bp"
                value="{{ old('diastolic_bp', $appointment->vitalSign?->diastolic_bp) }}"
                placeholder="Example: 80"
                required
            >


            <label>Pulse (bpm)</label>

            <input
                type="number"
                name="pulse"
                value="{{ old('pulse', $appointment->vitalSign?->pulse) }}"
                placeholder="Example: 75"
                required
            >


            <label>Weight (kg)</label>

            <input
                type="number"
                step="0.01"
                name="weight"
                value="{{ old('weight', $appointment->vitalSign?->weight) }}"
                placeholder="Example: 62.5"
                required
            >


            <button type="submit" class="btn">
                Save Vitals & Send to Doctor
            </button>

        </form>

    </div>

</div>

</body>
</html>