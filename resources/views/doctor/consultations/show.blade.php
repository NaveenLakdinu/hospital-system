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
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #198754;
            text-decoration: none;
            font-weight: 500;
        }

        .back:hover {
            text-decoration: underline;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
        }

        .patient-info {
            background: #eef8f7;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .patient-info p {
            margin: 8px 0;
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
            margin-bottom: 8px;
            font-family: Arial, sans-serif;
            resize: vertical;
        }

        textarea:focus {
            outline: none;
            border-color: #198754;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin: 5px 0 10px;
        }

        .btn {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 11px 20px;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover {
            background: #157347;
        }

        .status {
            font-weight: bold;
            text-transform: capitalize;
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

        {{-- Patient Information --}}
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
                <span class="status">
                    {{ ucfirst($appointment->status) }}
                </span>
            </p>

        </div>


        {{-- Consultation Form --}}
        <form
    method="POST"
    action="{{ route('doctor.consultation.store', $appointment->id) }}"
>
    @csrf

    <label>Diagnosis</label>

    <textarea
        name="diagnosis"
        required
    >{{ old('diagnosis') }}</textarea>

    <label>Consultation Notes</label>

    <textarea
        name="consultation_notes"
    >{{ old('consultation_notes') }}</textarea>

    <button type="submit" class="btn">
        Save & Continue to 
        Prescription
    </button>

</form>
     
</button>

    </div>



    </div>

</div>

</body>

</html>