<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Vital Signs</title>

    <style>
        * { box-sizing: border-box; }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e9f8f3;
            --text: #182236;
            --muted: #758197;
            --border: #e6edf1;
            --bg: #f5f7fa;
            --red: #dc3545;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, #dcfaf0 0%, transparent 26%),
                radial-gradient(circle at top right, #edf4ff 0%, transparent 28%),
                var(--bg);
        }

        .page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 28px;
        }

        .topbar {
            background: rgba(255,255,255,.96);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 18px 22px;
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .title {
            font-size: 22px;
            font-weight: 800;
        }

        .subtitle {
            color: var(--muted);
            font-size: 13px;
            margin-top: 4px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            border-radius: 12px;
            border: 1px solid #ccebdd;
            background: #effaf5;
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            transition: .2s ease;
        }

        .back-btn:hover {
            background: var(--primary);
            color: white;
        }

        .card {
            background: rgba(255,255,255,.98);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 10px 35px rgba(31,41,55,.04);
        }

        .patient-card {
            background: linear-gradient(120deg, rgba(223,250,242,.98), rgba(236,246,255,.98));
            border: 1px solid #dcefe8;
            margin-bottom: 22px;
        }

        .patient-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .info-item {
            background: rgba(255,255,255,.7);
            border: 1px solid #e6f1ed;
            border-radius: 16px;
            padding: 16px;
        }

        .label {
            color: #8a96a8;
            font-size: 12px;
            margin-bottom: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .value {
            font-size: 17px;
            font-weight: 800;
            line-height: 1.5;
        }

        .section-title {
            font-size: 24px;
            font-weight: 800;
            margin: 0 0 20px;
        }

        .helper-box {
            background: #eef8f4;
            border: 1px solid #d7eee5;
            border-radius: 14px;
            padding: 14px 16px;
            color: #557085;
            font-size: 14px;
            margin-bottom: 22px;
            line-height: 1.7;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .input-wrap {
            position: relative;
        }

        .field input {
            width: 100%;
            height: 56px;
            border: 1px solid #d8e4e9;
            border-radius: 14px;
            padding: 0 16px;
            font-size: 16px;
            outline: none;
            transition: .2s ease;
            background: #fff;
        }

        .field input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(10,147,104,.08);
        }

        .unit {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #8a95a6;
            font-size: 13px;
            font-weight: 700;
        }

        .error {
            color: var(--red);
            font-size: 13px;
            margin-top: 7px;
        }

        .actions {
            margin-top: 14px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 18px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            transition: .2s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: #f3f7f9;
            color: #556274;
            border: 1px solid #e1e8ec;
        }

        .btn-secondary:hover {
            background: #eaf0f3;
        }

        @media(max-width: 900px) {
            .patient-grid,
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 700px) {
            .page { padding: 14px; }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }
        }
    </style>
</head>
<body>

<div class="page">

    <div class="topbar">
        <div>
            <div class="title">Record Vital Signs</div>
            <div class="subtitle">Capture patient vital data before consultation</div>
        </div>

        <a href="{{ route('nurse.dashboard') }}" class="back-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
            Back to Dashboard
        </a>
    </div>

    @if(session('success'))

    <div style="
        background:#def8ea;
        color:#086b4b;
        border:1px solid #c3ead7;
        border-radius:12px;
        padding:15px 17px;
        margin-bottom:18px;
        font-weight:600;
    ">
        ✓ {{ session('success') }}
    </div>

@endif


@if(session('temporary_password'))

    <div style="
        background:#eef6ff;
        border:1px solid #d5e7fb;
        border-radius:14px;
        padding:17px;
        margin-bottom:20px;
        color:#344054;
    ">

        <strong>New Patient Login Details</strong>

        <br><br>

        Email:
        <strong>
            {{ session('new_patient_email') }}
        </strong>

        <br>

        Temporary Password:
        <strong>
            {{ session('temporary_password') }}
        </strong>

        <br><br>

        <small style="color:#758197;">
            Give these temporary login details to the patient.
        </small>

    </div>

@endif

    <div class="card patient-card">
        <h2 class="section-title" style="margin-bottom: 18px;">Patient Overview</h2>

        <div class="patient-grid">
            <div class="info-item">
                <div class="label">Patient Name</div>
                <div class="value">{{ $appointment->patient?->name ?? 'Unknown Patient' }}</div>
            </div>

            <div class="info-item">
                <div class="label">Token Number</div>
                <div class="value">#{{ $appointment->token_number }}</div>
            </div>

            <div class="info-item">
                <div class="label">Doctor</div>
                <div class="value">{{ $appointment->doctor?->user?->name ?? 'Unknown Doctor' }}</div>
            </div>

            <div class="info-item">
                <div class="label">Appointment Date</div>
                <div class="value">{{ $appointment->appointment_date }}</div>
            </div>

            <div class="info-item">
                <div class="label">Appointment Time</div>
                <div class="value">{{ $appointment->appointment_time }}</div>
            </div>

            <div class="info-item">
                <div class="label">Reason for Visit</div>
                <div class="value">{{ $appointment->reason_for_visit }}</div>
            </div>
        </div>
    </div>

    <div class="card">
        <h2 class="section-title">Vital Sign Entry Form</h2>

        <div class="helper-box">
            Enter the patient’s latest vital signs carefully. After saving, this patient
            can proceed to the doctor consultation workflow.
        </div>

        <form method="POST" action="{{ route('nurse.vitals.store', $appointment->id) }}">
            @csrf

            <div class="form-grid">

                <div class="field">
                    <label for="temperature">Temperature</label>
                    <div class="input-wrap">
                        <input
                            type="number"
                            step="0.1"
                            name="temperature"
                            id="temperature"
                            value="{{ old('temperature') }}"
                            placeholder="Enter temperature"
                        >
                        <span class="unit">°C</span>
                    </div>
                    @error('temperature')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="pulse">Pulse</label>
                    <div class="input-wrap">
                        <input
                            type="number"
                            name="pulse"
                            id="pulse"
                            value="{{ old('pulse') }}"
                            placeholder="Enter pulse"
                        >
                        <span class="unit">bpm</span>
                    </div>
                    @error('pulse')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="systolic_bp">Systolic Blood Pressure</label>
                    <div class="input-wrap">
                        <input
                            type="number"
                            name="systolic_bp"
                            id="systolic_bp"
                            value="{{ old('systolic_bp') }}"
                            placeholder="Enter systolic BP"
                        >
                        <span class="unit">mmHg</span>
                    </div>
                    @error('systolic_bp')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="diastolic_bp">Diastolic Blood Pressure</label>
                    <div class="input-wrap">
                        <input
                            type="number"
                            name="diastolic_bp"
                            id="diastolic_bp"
                            value="{{ old('diastolic_bp') }}"
                            placeholder="Enter diastolic BP"
                        >
                        <span class="unit">mmHg</span>
                    </div>
                    @error('diastolic_bp')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="weight">Weight</label>
                    <div class="input-wrap">
                        <input
                            type="number"
                            step="0.1"
                            name="weight"
                            id="weight"
                            value="{{ old('weight') }}"
                            placeholder="Enter weight"
                        >
                        <span class="unit">kg</span>
                    </div>
                    @error('weight')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">
                    Save Vital Signs
                </button>

                <a href="{{ route('nurse.dashboard') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>
</body>
</html>