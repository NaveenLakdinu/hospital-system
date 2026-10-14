<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Consultation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .patient-info {
            background: #eef8f7;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        textarea {
            width: 100%;
            min-height: 120px;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('doctor.dashboard') }}" class="back">
        ← Back to Dashboard
    </a>

    <div class="card">

        <h1>Patient Consultation</h1>

        <div class="patient-info">

            <p>
                <strong>Patient:</strong>
                {{ $appointment->patient->name }}
            </p>

            <p>
                <strong>Token:</strong>
                #{{ $appointment->token_number }}
            </p>

            <p>
                <strong>Appointment Date:</strong>
                {{ $appointment->appointment_date }}
            </p>

            <p>
                <strong>Appointment Time:</strong>
                {{ $appointment->appointment_time }}
            </p>

            <p>
                <strong>Reason for Visit:</strong>
                {{ $appointment->reason_for_visit }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ ucfirst($appointment->status) }}
            </p>

        </div>

        <label>Diagnosis</label>

        <textarea
            name="diagnosis"
            placeholder="Enter diagnosis..."
        ></textarea>


        <label>Consultation Notes</label>

        <textarea
            name="consultation_notes"
            placeholder="Enter consultation notes..."
        ></textarea>


        <a href="#" class="btn">
            Create Prescription
        </a>

    </div>

</div>

</body>
</html>