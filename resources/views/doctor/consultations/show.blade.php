<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Consultation</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
            color: #172033;
        }

        .container {
            max-width: 950px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .back {
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
            color: #198754;
            text-decoration: none;
            font-weight: 600;
        }

        .back:hover {
            text-decoration: underline;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .history-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #eef8f4;
            color: #198754;

            padding: 10px 16px;

            border: 1px solid #cdeadd;
            border-radius: 8px;

            text-decoration: none;
            font-weight: 600;

            margin-bottom: 20px;
        }

        .history-btn:hover {
            background: #198754;
            color: white;
        }

        .patient-info {
            background: #eef8f7;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .patient-info p {
            margin: 8px 0;
        }

        .status {
            font-weight: bold;
            text-transform: capitalize;
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

        .form-group {
            margin-bottom: 22px;
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

            border: 1px solid #ddd;
            border-radius: 7px;

            font-family: Arial, sans-serif;
            resize: vertical;
        }

        textarea:focus {
            outline: none;
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.08);
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 6px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #198754;
            color: white;

            padding: 11px 20px;

            border-radius: 7px;
            border: none;

            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
        }

        .btn:hover {
            background: #157347;
        }

        @media(max-width: 800px) {
            .vitals-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 500px) {
            .vitals-grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
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
            <div class="success">
                {{ session('success') }}
            </div>
        @endif


        <!-- PATIENT HISTORY BUTTON -->

        <a
            href="{{ route('doctor.patient.history', [
                'appointment' => $appointment->id,
                'patient' => $appointment->patient_id
            ]) }}"
            class="history-btn"
        >
            <svg
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M12 7v5l3 2"></path>
            </svg>

            View Patient History
        </a>


        <!-- PATIENT INFORMATION -->

        <div class="patient-info">

            <p>
                <strong>Patient:</strong>
                {{ $appointment->patient?->name ?? 'Unknown Patient' }}
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


        <!-- CONSULTATION FORM -->

        <form
            method="POST"
            action="{{ route('doctor.consultation.store', $appointment->id) }}"
        >

            @csrf


            <!-- VITAL SIGNS -->

            <div class="vitals-card">

                <div class="vitals-header">

                    <h2>
                        Patient Vital Signs
                    </h2>

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


            <!-- DIAGNOSIS -->

            <div class="form-group">

                <label for="diagnosis">
                    Diagnosis
                </label>

                <textarea
                    id="diagnosis"
                    name="diagnosis"
                    placeholder="Enter diagnosis..."
                    required
                >{{ old('diagnosis') }}</textarea>

                @error('diagnosis')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- CONSULTATION NOTES -->

            <div class="form-group">

                <label for="consultation_notes">
                    Consultation Notes
                </label>

                <textarea
                    id="consultation_notes"
                    name="consultation_notes"
                    placeholder="Enter consultation notes..."
                >{{ old('consultation_notes') }}</textarea>

                @error('consultation_notes')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <button type="submit" class="btn">

                Save & Create Prescription

            </button>

        </form>

    </div>

</div>

</body>

</html>