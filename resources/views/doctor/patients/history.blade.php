<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Medical History</title>

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
            max-width: 1200px;
            margin: auto;
            padding: 28px;
        }

        a {
            text-decoration: none;
        }

        /* TOP BAR */

        .topbar {
            background: rgba(255,255,255,0.96);
            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 18px 22px;
            margin-bottom: 22px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow: 0 8px 28px rgba(31,41,55,0.04);
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

        .back-btn {
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

            transition: .2s;
        }

        .back-btn:hover {
            background: var(--primary);
            color: white;
        }

        /* PATIENT HERO */

        .patient-hero {
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

            margin-bottom: 24px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;
        }

        .patient-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .patient-avatar {
            width: 76px;
            height: 76px;

            border-radius: 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: linear-gradient(145deg, #0ba87a, #087f68);

            color: white;
            font-size: 28px;
            font-weight: 800;

            box-shadow: 0 10px 25px rgba(10,147,104,.18);
        }

        .patient-label {
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .patient-name {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .patient-email {
            color: var(--muted);
            margin-top: 7px;
            font-size: 14px;
        }

        .history-count {
            background: rgba(255,255,255,.8);

            border: 1px solid #e1ebe7;
            border-radius: 16px;

            padding: 16px 22px;
            text-align: center;
        }

        .history-number {
            font-size: 27px;
            font-weight: 800;
            color: var(--primary);
        }

        .history-label {
            color: var(--muted);
            font-size: 12px;
            margin-top: 4px;
        }

        /* SECTION */

        .section-heading {
            display: flex;
            align-items: center;
            gap: 11px;

            margin: 25px 0 17px;
        }

        .section-mark {
            width: 5px;
            height: 29px;

            border-radius: 20px;

            background: linear-gradient(
                to bottom,
                #17c991,
                #26a4dc
            );
        }

        .section-title {
            font-size: 22px;
            font-weight: 800;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 12px;
            margin-top: 4px;
        }

        /* HISTORY CARDS */

        .history-list {
            display: flex;
            flex-direction: column;
            gap: 17px;
        }

        .history-card {
            background: white;

            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 23px;

            box-shadow: 0 8px 28px rgba(31,41,55,.035);
        }

        .history-card:hover {
            border-color: #cfe8df;
        }

        .history-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding-bottom: 16px;
            margin-bottom: 18px;

            border-bottom: 1px solid #edf0f2;
        }

        .visit-title {
            display: flex;
            align-items: center;
            gap: 10px;

            font-weight: 800;
        }

        .visit-icon {
            width: 40px;
            height: 40px;

            border-radius: 11px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--primary-soft);
            color: var(--primary);
        }

        .visit-date {
            background: #eef8f5;
            color: var(--primary);

            padding: 7px 11px;
            border-radius: 100px;

            font-size: 12px;
            font-weight: 700;
        }

        .history-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .detail-box {
            background: #fbfcfd;

            border: 1px solid #e9eef2;
            border-radius: 13px;

            padding: 16px;
        }

        .detail-label {
            color: #8b95a5;
            font-size: 11px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: .5px;

            margin-bottom: 7px;
        }

        .detail-value {
            color: #2c3748;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.6;
        }

        /* PRESCRIPTION */

        .prescription-title {
            margin-top: 19px;
            margin-bottom: 10px;

            font-size: 13px;
            font-weight: 800;

            color: #455267;
        }

        .medicine-box {
            background:
                linear-gradient(
                    120deg,
                    #f0faf6,
                    #f6faff
                );

            border: 1px solid #dfeee8;
            border-radius: 13px;

            padding: 16px;

            margin-top: 10px;
        }

        .medicine-top {
            display: flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 12px;
        }

        .medicine-icon {
            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: white;
            color: var(--primary);

            border-radius: 10px;
        }

        .medicine-name {
            color: #087c59;
            font-size: 16px;
            font-weight: 800;
        }

        .medicine-details {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .medicine-detail {
            background: rgba(255,255,255,.75);
            padding: 10px;

            border-radius: 9px;

            font-size: 12px;
        }

        .medicine-detail strong {
            display: block;
            color: #8a95a6;
            font-size: 10px;

            margin-bottom: 4px;
        }

        .instruction {
            margin-top: 10px;

            background: white;

            border-radius: 9px;
            padding: 11px;

            color: #5d6879;

            font-size: 12px;
            line-height: 1.5;
        }

        /* EMPTY */

        .empty {
            background: white;

            border: 1px dashed #cfded9;
            border-radius: 18px;

            padding: 50px 20px;

            text-align: center;

            color: #7c8797;
        }

        .empty-icon {
            width: 60px;
            height: 60px;

            margin: 0 auto 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;

            background: var(--primary-soft);
            color: var(--primary);
        }

        .empty-title {
            font-weight: 800;
            color: #344054;

            margin-bottom: 6px;
        }

        @media(max-width: 750px) {

            .page {
                padding: 14px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .patient-hero {
                flex-direction: column;
                align-items: flex-start;
            }

            .patient-left {
                flex-direction: column;
                align-items: flex-start;
            }

            .history-grid {
                grid-template-columns: 1fr;
            }

            .medicine-details {
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
                Patient Medical History
            </div>

            <div class="topbar-subtitle">
                Previous consultations, diagnoses and prescriptions
            </div>

        </div>


        <a
            href="{{ route(
                'doctor.consultation.show',
                $currentAppointment->id
            ) }}"
            class="back-btn"
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

            Back to Patient Consultation

        </a>

    </div>


    <!-- PATIENT HERO -->

    <div class="patient-hero">

        <div class="patient-left">

            <div class="patient-avatar">

                {{ strtoupper(substr($patient->name, 0, 1)) }}

            </div>


            <div>

                <div class="patient-label">
                    PATIENT RECORD
                </div>

                <h1 class="patient-name">
                    {{ $patient->name }}
                </h1>

                <div class="patient-email">
                    {{ $patient->email }}
                </div>

            </div>

        </div>


        <div class="history-count">

            <div class="history-number">
                {{ $consultations->count() }}
            </div>

            <div class="history-label">
                Previous Consultations
            </div>

        </div>

    </div>


    <!-- SECTION HEADING -->

    <div class="section-heading">

        <span class="section-mark"></span>

        <div>

            <div class="section-title">
                Medical History
            </div>

            <div class="section-subtitle">
                Review this patient's previous clinical records
            </div>

        </div>

    </div>


    <!-- HISTORY -->

    @if($consultations->count())

        <div class="history-list">

            @foreach($consultations as $consultation)

                <div class="history-card">

                    <div class="history-header">

                        <div class="visit-title">

                            <div class="visit-icon">

                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path d="M12 2v20"></path>
                                    <path d="M5 9h14"></path>
                                </svg>

                            </div>

                            Previous Consultation

                        </div>


                        <div class="visit-date">

                            @if($consultation->appointment)

                                {{ \Carbon\Carbon::parse(
                                    $consultation->appointment->appointment_date
                                )->format('d M Y') }}

                            @else

                                {{ $consultation->created_at->format('d M Y') }}

                            @endif

                        </div>

                    </div>


                    <div class="history-grid">

                        <!-- DIAGNOSIS -->

                        <div class="detail-box">

                            <div class="detail-label">
                                Diagnosis
                            </div>

                            <div class="detail-value">
                                {{ $consultation->diagnosis }}
                            </div>

                        </div>


                        <!-- NOTES -->

                        <div class="detail-box">

                            <div class="detail-label">
                                Consultation Notes
                            </div>

                            <div class="detail-value">

                                {{ $consultation->consultation_notes
                                    ?? 'No consultation notes recorded.'
                                }}

                            </div>

                        </div>

                    </div>


                    <!-- PRESCRIPTION -->

                    <div class="prescription-title">
                        Prescription
                    </div>


                    @if($consultation->prescription)

                        @forelse(
                            $consultation->prescription->items
                            as $item
                        )

                            <div class="medicine-box">

                                <div class="medicine-top">

                                    <div class="medicine-icon">

                                        <svg
                                            width="19"
                                            height="19"
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


                                <div class="medicine-details">

                                    <div class="medicine-detail">

                                        <strong>
                                            DOSAGE
                                        </strong>

                                        {{ $item->dosage }}

                                    </div>


                                    <div class="medicine-detail">

                                        <strong>
                                            FREQUENCY
                                        </strong>

                                        {{ $item->frequency }}

                                    </div>


                                    <div class="medicine-detail">

                                        <strong>
                                            DURATION
                                        </strong>

                                        {{ $item->duration }}

                                    </div>

                                </div>


                                @if($item->instructions)

                                    <div class="instruction">

                                        <strong>Instructions:</strong>

                                        {{ $item->instructions }}

                                    </div>

                                @endif

                            </div>

                        @empty

                            <div class="detail-box">

                                <div class="detail-value">
                                    No medicines recorded.
                                </div>

                            </div>

                        @endforelse


                    @else

                        <div class="detail-box">

                            <div class="detail-value">
                                No prescription recorded for this consultation.
                            </div>

                        </div>

                    @endif

                </div>

            @endforeach

        </div>


    @else

        <div class="empty">

            <div class="empty-icon">

                <svg
                    width="27"
                    height="27"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M12 7v5"></path>
                    <path d="M12 16h.01"></path>
                </svg>

            </div>


            <div class="empty-title">
                No Previous Medical History
            </div>

            This patient does not have any previous consultation records yet.

        </div>

    @endif

</div>

</body>

</html>