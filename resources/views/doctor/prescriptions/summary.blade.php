<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prescription Summary</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e7f8f2;

            --blue: #2589c8;

            --text: #182236;
            --muted: #758197;
            --border: #e7edf1;
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
            max-width: 1100px;

            margin: auto;

            padding: 28px;
        }

        a {
            text-decoration: none;
        }

        .topbar {
            background: white;

            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 18px 22px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;

            box-shadow: 0 8px 28px rgba(31,41,55,.04);
        }

        .topbar-title {
            font-size: 20px;
            font-weight: 800;
        }

        .topbar-subtitle {
            color: var(--muted);

            font-size: 13px;

            margin-top: 5px;
        }

        .dashboard-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 11px 16px;

            background: #effaf6;
            color: var(--primary);

            border: 1px solid #c9e9dc;
            border-radius: 10px;

            font-size: 13px;
            font-weight: 700;
        }

        .dashboard-btn:hover {
            background: var(--primary);
            color: white;
        }

        .success {
            background: #def8ea;
            color: #086b4b;

            border: 1px solid #c3ead7;
            border-radius: 12px;

            padding: 14px 17px;

            margin-bottom: 20px;

            font-weight: 600;
        }

        .hero {
            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    120deg,
                    rgba(220,250,240,.96),
                    rgba(239,248,255,.96),
                    rgba(247,242,255,.93)
                );

            border: 1px solid #dcefe8;
            border-radius: 24px;

            padding: 30px;

            margin-bottom: 22px;
        }

        .verified {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #d9f8eb;
            color: #087a59;

            border-radius: 100px;

            padding: 7px 12px;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 13px;
        }

        .verified span {
            width: 8px;
            height: 8px;

            border-radius: 50%;

            background: #11b67d;
        }

        .hero h1 {
            margin: 0;

            font-size: 30px;
        }

        .hero p {
            color: #667386;

            margin: 9px 0 0;
        }

        .summary-card {
            background: white;

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 25px;

            margin-bottom: 20px;

            box-shadow: 0 8px 30px rgba(31,41,55,.035);
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 11px;

            margin-bottom: 20px;
        }

        .section-mark {
            width: 5px;
            height: 28px;

            border-radius: 20px;

            background: linear-gradient(
                to bottom,
                #17c991,
                #26a4dc
            );
        }

        .section-title h2 {
            margin: 0;

            font-size: 21px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 14px;
        }

        .info-box {
            background: #fbfcfd;

            border: 1px solid #e9eef2;
            border-radius: 13px;

            padding: 16px;
        }

        .info-label {
            color: #8b95a5;

            font-size: 11px;
            font-weight: 700;

            text-transform: uppercase;

            margin-bottom: 7px;
        }

        .info-value {
            color: #344054;

            font-size: 14px;
            font-weight: 700;

            line-height: 1.5;
        }

        .medicine-card {
            background:
                linear-gradient(
                    120deg,
                    #f0faf6,
                    #f6faff
                );

            border: 1px solid #dfeee8;
            border-radius: 15px;

            padding: 18px;

            margin-top: 12px;
        }

        .medicine-header {
            display: flex;
            align-items: center;

            gap: 11px;

            margin-bottom: 15px;
        }

        .medicine-icon {
            width: 42px;
            height: 42px;

            background: white;
            color: var(--primary);

            border-radius: 11px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .medicine-name {
            font-size: 17px;
            font-weight: 800;

            color: #087c59;
        }

        .medicine-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 11px;
        }

        .medicine-detail {
            background: rgba(255,255,255,.78);

            padding: 12px;

            border-radius: 10px;
        }

        .medicine-label {
            color: #8b95a5;

            font-size: 10px;
            font-weight: 700;

            margin-bottom: 5px;

            text-transform: uppercase;
        }

        .medicine-value {
            font-size: 13px;
            font-weight: 700;

            color: #3f4b5d;
        }

        .instructions {
            margin-top: 12px;

            background: white;

            border-radius: 10px;

            padding: 13px;

            color: #5e6979;

            font-size: 13px;
            line-height: 1.6;
        }

        .footer-actions {
            display: flex;
            justify-content: flex-end;

            margin-top: 20px;
        }

        .primary-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 11px 17px;

            background: var(--primary);
            color: white;

            border-radius: 10px;

            font-size: 13px;
            font-weight: 700;
        }

        .primary-btn:hover {
            background: var(--primary-dark);
        }

        @media(max-width: 750px) {

            .page {
                padding: 14px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;

                gap: 13px;
            }

            .info-grid,
            .medicine-grid {
                grid-template-columns: 1fr;
            }

        }
    </style>

</head>

<body>

<div class="page">

    <!-- TOP BAR -->

    <div class="topbar">

        <div>

            <div class="topbar-title">
                Prescription Summary
            </div>

            <div class="topbar-subtitle">
                Completed clinical consultation record
            </div>

        </div>


        <a
            href="{{ route('doctor.dashboard') }}"
            class="dashboard-btn"
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

    </div>


    @if(session('success'))

        <div class="success">
            ✓ {{ session('success') }}
        </div>

    @endif


    <!-- HERO -->

    <div class="hero">

        <div class="verified">
            <span></span>
            Prescription Saved
        </div>


        <h1>
            {{ $prescription->patient?->name ?? 'Patient' }}
        </h1>


        <p>
            Consultation and prescription successfully completed.
        </p>

    </div>


    <!-- CONSULTATION -->

    <div class="summary-card">

        <div class="section-title">

            <span class="section-mark"></span>

            <h2>
                Consultation Information
            </h2>

        </div>


        <div class="info-grid">


            <div class="info-box">

                <div class="info-label">
                    Patient
                </div>

                <div class="info-value">
                    {{ $prescription->patient?->name ?? 'Unknown Patient' }}
                </div>

            </div>


            <div class="info-box">

                <div class="info-label">
                    Appointment
                </div>

                <div class="info-value">

                    {{ $prescription->appointment?->appointment_date }}

                    @if($prescription->appointment?->appointment_time)

                        at
                        {{ $prescription->appointment->appointment_time }}

                    @endif

                </div>

            </div>


            <div class="info-box">

                <div class="info-label">
                    Diagnosis
                </div>

                <div class="info-value">

                    {{ $prescription->consultation?->diagnosis
                        ?? 'Not available'
                    }}

                </div>

            </div>


            <div class="info-box">

                <div class="info-label">
                    Consultation Notes
                </div>

                <div class="info-value">

                    {{ $prescription->consultation?->consultation_notes
                        ?? 'No notes recorded.'
                    }}

                </div>

            </div>

        </div>

    </div>


    <!-- MEDICINE -->

    <div class="summary-card">

        <div class="section-title">

            <span class="section-mark"></span>

            <h2>
                Medication Plan
            </h2>

        </div>


        @forelse($prescription->items as $item)

            <div class="medicine-card">

                <div class="medicine-header">

                    <div class="medicine-icon">

                        <svg
                            width="21"
                            height="21"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M10.5 20.5l10-10a4.24 4.24 0 0 0-6-6l-10 10a4.24 4.24 0 0 0 6 6z"></path>
                            <path d="M8.5 8.5l7 7"></path>
                        </svg>

                    </div>


                    <div class="medicine-name">
                        {{ $item->medicine_name }}
                    </div>

                </div>


                <div class="medicine-grid">

                    <div class="medicine-detail">

                        <div class="medicine-label">
                            Dosage
                        </div>

                        <div class="medicine-value">
                            {{ $item->dosage }}
                        </div>

                    </div>


                    <div class="medicine-detail">

                        <div class="medicine-label">
                            Frequency
                        </div>

                        <div class="medicine-value">
                            {{ $item->frequency }}
                        </div>

                    </div>


                    <div class="medicine-detail">

                        <div class="medicine-label">
                            Duration
                        </div>

                        <div class="medicine-value">
                            {{ $item->duration }}
                        </div>

                    </div>

                </div>


                <div class="instructions">

                    <strong>
                        Instructions:
                    </strong>

                    {{ $item->instructions
                        ?? $prescription->instructions
                        ?? 'No special instructions.'
                    }}

                </div>

            </div>

        @empty

            <div class="info-box">

                <div class="info-value">
                    No medicines recorded.
                </div>

            </div>

        @endforelse


        <div class="footer-actions">

            <a
                href="{{ route('doctor.dashboard') }}"
                class="primary-btn"
            >
                Return to Dashboard
                →
            </a>

        </div>

    </div>

</div>

</body>

</html>