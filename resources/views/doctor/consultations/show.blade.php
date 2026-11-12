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

        button.btn {
            border: none;
            cursor: pointer;
            font-size: 16px;
}

.vitals-card {
    background: linear-gradient(135deg, #f0fbf7, #f4f9ff);
    border: 1px solid #dcefe8;
    border-radius: 14px;
    padding: 22px;
    margin-bottom: 25px;
}

.vitals-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.vitals-header h2 {
    margin: 0;
    font-size: 20px;
}

.vitals-status {
    background: #d9f8e9;
    color: #087b58;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
}

.vitals-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
}

.vital-box {
    background: white;
    border: 1px solid #edf0f2;
    border-radius: 12px;
    padding: 16px;

    display: flex;
    gap: 12px;
    align-items: center;
}

.vital-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;

    background: #e6f7f1;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #0a946b;
    font-size: 20px;
}

.vital-label {
    color: #7b8795;
    font-size: 12px;
    margin-bottom: 5px;
}

.vital-value {
    font-weight: 700;
    font-size: 16px;
}

.recorded-by {
    margin-top: 15px;
    color: #667085;
    font-size: 13px;
}

.no-vitals {
    color: #777;
    background: white;
    padding: 16px;
    border-radius: 10px;
}

@media(max-width: 800px) {
    .vitals-grid {
        grid-template-columns: repeat(2, 1fr);
    }
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

    <div class="vitals-card">

    <div class="vitals-header">

        <h2>Patient Vital Signs</h2>

        @if($appointment->vitalSign)
            <span class="vitals-status">
                Nurse Checked
            </span>
        @endif

    </div>


    @if($appointment->vitalSign)

        <div class="vitals-grid">

            <div class="vital-box">

                <div class="vital-icon">
                    🌡
                </div>

                <div>
                    <div class="vital-label">
                        Temperature
                    </div>

                    <div class="vital-value">
                        {{ $appointment->vitalSign->temperature }} °C
                    </div>
                </div>

            </div>


            <div class="vital-box">

                <div class="vital-icon">
                    ♥
                </div>

                <div>
                    <div class="vital-label">
                        Blood Pressure
                    </div>

                    <div class="vital-value">

                        {{ $appointment->vitalSign->systolic_bp }}
                        /
                        {{ $appointment->vitalSign->diastolic_bp }}

                        mmHg

                    </div>
                </div>

            </div>


            <div class="vital-box">

                <div class="vital-icon">
                    ♡
                </div>

                <div>
                    <div class="vital-label">
                        Pulse
                    </div>

                    <div class="vital-value">
                        {{ $appointment->vitalSign->pulse }} bpm
                    </div>
                </div>

            </div>


            <div class="vital-box">

                <div class="vital-icon">
                    ⚖
                </div>

                <div>
                    <div class="vital-label">
                        Weight
                    </div>

                    <div class="vital-value">
                        {{ $appointment->vitalSign->weight }} kg
                    </div>
                </div>

            </div>

        </div>


        <div class="recorded-by">

            Recorded by:
            <strong>
                {{ $appointment->vitalSign->nurse?->name ?? 'Nurse' }}
            </strong>

        </div>

    @else

        <div class="no-vitals">
            No vital signs recorded for this patient.
        </div>

    @endif

</div>

    <label>Diagnosis</label>

    <textarea
        name="diagnosis"
        placeholder="Enter diagnosis..."
        required
    >{{ old('diagnosis') }}</textarea>

    @error('diagnosis')
        <p style="color:red;">
            {{ $message }}
        </p>
    @enderror


    <label>Consultation Notes</label>

    <textarea
        name="consultation_notes"
        placeholder="Enter consultation notes..."
    >{{ old('consultation_notes') }}</textarea>


    <button type="submit" class="btn">
        Save & Create Prescription
    </button>

</form>
     
</button>

    </div>



    </div>

</div>

</body>

</html>