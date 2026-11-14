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

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e7f8f2;

            --blue: #2589c8;
            --blue-soft: #e9f5fd;

            --orange: #e88714;
            --orange-soft: #fff3e1;

            --text: #182236;
            --muted: #758197;
            --border: #e7edf1;
            --surface: #ffffff;
            --background: #f5f7fa;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text);

            background:
                radial-gradient(circle at top left, #ddfaf1 0%, transparent 25%),
                radial-gradient(circle at top right, #edf3ff 0%, transparent 28%),
                var(--background);
        }

        .page {
            max-width: 1350px;
            margin: 0 auto;
            padding: 28px;
        }

        a {
            text-decoration: none;
        }

        /* TOP BAR */

        .topbar {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 18px 22px;
            margin-bottom: 22px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 16px;

            box-shadow: 0 8px 28px rgba(31, 41, 55, 0.04);
        }

        .topbar-left h1 {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
        }

        .topbar-left p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .ghost-btn,
        .history-btn,
        .primary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 11px 16px;

            border-radius: 10px;

            font-size: 14px;
            font-weight: 700;

            transition: 0.2s ease;
        }

        .ghost-btn {
            background: #f3faf7;
            color: var(--primary);

            border: 1px solid #cae9dc;
        }

        .ghost-btn:hover {
            background: var(--primary);
            color: white;
        }

        .history-btn {
            background: #eef6ff;
            color: var(--blue);

            border: 1px solid #d5e7fb;
        }

        .history-btn:hover {
            background: var(--blue);
            color: white;
        }

        /* SUCCESS */

        .success-message {
            background: #def8ea;
            color: #086b4b;

            border: 1px solid #c3ead7;
            border-radius: 12px;

            padding: 14px 17px;
            margin-bottom: 20px;

            font-weight: 600;
        }

        /* HERO */

        .hero-card {
            background:
                linear-gradient(
                    120deg,
                    rgba(220, 250, 240, 0.95),
                    rgba(239, 248, 255, 0.95),
                    rgba(247, 242, 255, 0.93)
                );

            border: 1px solid #dcefe8;
            border-radius: 24px;

            padding: 28px 30px;
            margin-bottom: 22px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;
        }

        .hero-left {
            flex: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #d9f8eb;
            color: #087a59;

            padding: 7px 12px;

            border-radius: 100px;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 14px;
        }

        .hero-badge-dot {
            width: 8px;
            height: 8px;

            border-radius: 50%;
            background: #11b67d;
        }

        .hero-title {
            margin: 0;

            font-size: 32px;
            letter-spacing: -0.5px;
        }

        .hero-subtitle {
            margin-top: 10px;

            color: #637186;

            font-size: 15px;
            line-height: 1.6;

            max-width: 720px;
        }

        .hero-meta {
            display: flex;
            flex-wrap: wrap;

            gap: 10px;

            margin-top: 16px;
        }

        .hero-chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: rgba(255, 255, 255, 0.8);

            border: 1px solid #ddebe5;
            border-radius: 10px;

            color: #5d6a7c;

            padding: 8px 12px;

            font-size: 13px;
            font-weight: 600;
        }

        .hero-side {
            min-width: 250px;
        }

        .status-panel {
            background: rgba(255, 255, 255, 0.82);

            border: 1px solid #e3ece8;
            border-radius: 18px;

            padding: 18px;
        }

        .status-panel-title {
            color: var(--muted);

            font-size: 12px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: 0.8px;

            margin-bottom: 12px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 8px 12px;

            border-radius: 100px;

            font-size: 13px;
            font-weight: 700;
        }

        .status-pill::before {
            content: "";

            width: 8px;
            height: 8px;

            border-radius: 50%;
        }

        .status-confirmed {
            background: #eaf2ff;
            color: #246cd3;
        }

        .status-confirmed::before {
            background: #2f75db;
        }

        .status-waiting {
            background: #fff1dd;
            color: #d77708;
        }

        .status-waiting::before {
            background: #f39a25;
        }

        .status-completed {
            background: #e1f7ec;
            color: #10815a;
        }

        .status-completed::before {
            background: #11a36d;
        }

        .status-pending {
            background: #f0f2f5;
            color: #70798a;
        }

        .status-pending::before {
            background: #7f8795;
        }

        .status-cancelled {
            background: #ffe9eb;
            color: #ca3443;
        }

        .status-cancelled::before {
            background: #dd3e4d;
        }

        /* LAYOUT */

        .layout-grid {
            display: grid;

            grid-template-columns: 1.2fr 1fr;

            gap: 22px;

            align-items: start;
        }

        /* SECTION */

        .section-card {
            background: rgba(255, 255, 255, 0.97);

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 24px;

            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.035);
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 11px;

            margin-bottom: 18px;
        }

        .section-mark {
            width: 5px;
            height: 28px;

            border-radius: 20px;

            background:
                linear-gradient(
                    to bottom,
                    #17c991,
                    #26a4dc
                );
        }

        .section-title h2 {
            margin: 0;

            font-size: 22px;
            font-weight: 800;
        }

        .section-title p {
            margin: 4px 0 0;

            color: var(--muted);

            font-size: 12px;
        }

        /* PATIENT INFO */

        .patient-info-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 14px;
        }

        .info-box {
            background: #fbfcfd;

            border: 1px solid #e9eef2;
            border-radius: 14px;

            padding: 16px;
        }

        .info-label {
            color: #8a95a6;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 7px;
        }

        .info-value {
            font-size: 18px;
            font-weight: 800;

            color: var(--text);
        }

        .info-subvalue {
            font-size: 14px;
            font-weight: 600;

            color: #445164;
        }

        /* VITALS */

        .vitals-card {
            background:
                linear-gradient(
                    135deg,
                    #f0fbf7,
                    #f4f9ff
                );

            border: 1px solid #dcefe8;
            border-radius: 20px;

            padding: 24px;

            margin-top: 22px;
        }

        .vitals-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 12px;

            margin-bottom: 18px;
        }

        .vitals-header h3 {
            margin: 0;

            font-size: 24px;
        }

        .vitals-status {
            background: #d9f8e9;
            color: #087b58;

            padding: 8px 12px;

            border-radius: 100px;

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;
        }

        .vitals-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 14px;
        }

        .vital-box {
            background: white;

            border: 1px solid #edf0f2;
            border-radius: 14px;

            padding: 18px;

            display: flex;
            align-items: center;
            gap: 14px;
        }

        .vital-icon {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            background: #e6f7f1;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #0a946b;
            font-size: 22px;

            flex-shrink: 0;
        }

        .vital-label {
            color: #7b8795;

            font-size: 13px;
            font-weight: 600;

            margin-bottom: 5px;
        }

        .vital-value {
            font-weight: 800;
            font-size: 18px;

            line-height: 1.3;
        }

        .recorded-by {
            margin-top: 16px;

            color: #667085;

            font-size: 13px;
            font-weight: 600;
        }

        .no-vitals {
            color: #777;

            background: white;

            padding: 18px;

            border-radius: 12px;
            border: 1px dashed #d8e3df;

            font-size: 14px;
        }

        /* FORM */

        .form-card {
            background: rgba(255, 255, 255, 0.97);

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 24px;

            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.035);
        }

        .form-title {
            display: flex;
            align-items: center;
            gap: 11px;

            margin-bottom: 18px;
        }

        .form-title h2 {
            margin: 0;

            font-size: 22px;
            font-weight: 800;
        }

        .form-title p {
            margin: 4px 0 0;

            color: var(--muted);

            font-size: 12px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;

            font-size: 15px;
            font-weight: 700;

            margin-bottom: 9px;

            color: var(--text);
        }

        textarea {
            width: 100%;
            min-height: 130px;

            padding: 14px 15px;

            border: 1px solid #dbe2e8;
            border-radius: 12px;

            font-family: Arial, sans-serif;
            font-size: 15px;

            color: var(--text);

            background: #fbfcfd;

            resize: vertical;

            transition: 0.2s ease;
        }

        textarea:focus {
            outline: none;

            border-color: #9ad6c1;
            background: white;

            box-shadow:
                0 0 0 4px rgba(10, 147, 104, 0.08);
        }

        .error {
            color: #dc3545;

            font-size: 14px;
            font-weight: 600;

            margin-top: 7px;
        }

        .primary-btn {
            background: var(--primary);
            color: white;

            border: none;

            cursor: pointer;
        }

        .primary-btn:hover {
            background: var(--primary-dark);
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;

            margin-top: 10px;
        }

        /* RESPONSIVE */

        @media(max-width: 1050px) {

            .layout-grid {
                grid-template-columns: 1fr;
            }

        }

        @media(max-width: 850px) {

            .page {
                padding: 14px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .hero-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .hero-title {
                font-size: 26px;
            }

            .patient-info-grid {
                grid-template-columns: 1fr;
            }

            .vitals-grid {
                grid-template-columns: 1fr;
            }

        }

        @media(max-width: 560px) {

            .topbar-actions {
                width: 100%;
            }

            .ghost-btn,
            .history-btn,
            .primary-btn {
                width: 100%;
            }

        }
    </style>

</head>

<body>

@php

    $statusClass = match(strtolower($appointment->status)) {
        'confirmed' => 'status-confirmed',
        'waiting' => 'status-waiting',
        'completed' => 'status-completed',
        'cancelled' => 'status-cancelled',
        default => 'status-pending',
    };

@endphp


<div class="page">


    <!-- TOP BAR -->

    <div class="topbar">

        <div class="topbar-left">

            <h1>
                Patient Consultation
            </h1>

            <p>
                Review patient details, vital signs, and record today's consultation.
            </p>

        </div>


        <div class="topbar-actions">


            <!-- BACK TO DASHBOARD -->

            <a
                href="{{ route('doctor.dashboard') }}"
                class="ghost-btn"
            >

                <svg
                    width="17"
                    height="17"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path d="M19 12H5"></path>
                    <path d="M12 19l-7-7 7-7"></path>
                </svg>

                Back to Dashboard

            </a>


            <!-- VIEW PATIENT HISTORY -->

            <a
                href="{{ route('doctor.patient.history', [
                    'appointment' => $appointment->id,
                    'patient' => $appointment->patient_id
                ]) }}"
                class="history-btn"
            >

                <svg
                    width="17"
                    height="17"
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

        </div>

    </div>


    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div class="success-message">
            ✓ {{ session('success') }}
        </div>

    @endif


    <!-- PATIENT HERO -->

    <div class="hero-card">

        <div class="hero-left">

            <div class="hero-badge">

                <span class="hero-badge-dot"></span>

                Consultation In Progress

            </div>


            <h2 class="hero-title">

                {{ $appointment->patient?->name ?? 'Unknown Patient' }}

            </h2>


            <div class="hero-subtitle">

                Review the appointment details and recorded nurse vitals
                before saving the diagnosis and consultation notes.

            </div>


            <div class="hero-meta">


                <span class="hero-chip">

                    <strong>Token:</strong>

                    #{{ $appointment->token_number }}

                </span>


                <span class="hero-chip">

                    <strong>Date:</strong>

                    {{ $appointment->appointment_date }}

                </span>


                <span class="hero-chip">

                    <strong>Time:</strong>

                    {{ $appointment->appointment_time }}

                </span>

            </div>

        </div>


        <!-- STATUS -->

        <div class="hero-side">

            <div class="status-panel">

                <div class="status-panel-title">
                    Appointment Status
                </div>


                <span class="status-pill {{ $statusClass }}">

                    {{ ucfirst($appointment->status) }}

                </span>

            </div>

        </div>

    </div>


    <!-- MAIN CONTENT -->

    <div class="layout-grid">


        <!-- LEFT COLUMN -->

        <div>


            <!-- PATIENT DETAILS -->

            <div class="section-card">

                <div class="section-title">

                    <span class="section-mark"></span>

                    <div>

                        <h2>
                            Patient Details
                        </h2>

                        <p>
                            Appointment and patient information
                        </p>

                    </div>

                </div>


                <div class="patient-info-grid">


                    <div class="info-box">

                        <div class="info-label">
                            Patient Name
                        </div>

                        <div class="info-value">

                            {{ $appointment->patient?->name ?? 'Unknown Patient' }}

                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Reason for Visit
                        </div>

                        <div class="info-subvalue">

                            {{ $appointment->reason_for_visit }}

                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Appointment Date
                        </div>

                        <div class="info-subvalue">

                            {{ $appointment->appointment_date }}

                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Appointment Time
                        </div>

                        <div class="info-subvalue">

                            {{ $appointment->appointment_time }}

                        </div>

                    </div>

                </div>

            </div>


            <!-- VITAL SIGNS -->

            <div class="vitals-card">

                <div class="vitals-header">

                    <h3>
                        Patient Vital Signs
                    </h3>


                    @if($appointment->vitalSign)

                        <span class="vitals-status">
                            Nurse Checked
                        </span>

                    @endif

                </div>


                @if($appointment->vitalSign)


                    <div class="vitals-grid">


                        <!-- TEMPERATURE -->

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


                        <!-- BLOOD PRESSURE -->

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


                        <!-- PULSE -->

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


                        <!-- WEIGHT -->

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

                        No vital signs recorded for this patient yet.

                    </div>


                @endif

            </div>

        </div>


        <!-- RIGHT COLUMN -->

        <div>


            <div class="form-card">

                <div class="form-title">

                    <span class="section-mark"></span>

                    <div>

                        <h2>
                            Consultation Notes
                        </h2>

                        <p>
                            Save diagnosis and notes, then proceed to prescription creation
                        </p>

                    </div>

                </div>


                <form
                    method="POST"
                    action="{{ route(
                        'doctor.consultation.store',
                        $appointment->id
                    ) }}"
                >

                    @csrf


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


                    <!-- SUBMIT -->

                    <div class="form-footer">

                        <button
                            type="submit"
                            class="primary-btn"
                        >

                            Save & Create Prescription

                            <span>→</span>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>

</html>