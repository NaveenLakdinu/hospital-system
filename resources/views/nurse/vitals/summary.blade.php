<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital Signs Summary</title>

    <style>
        * { box-sizing: border-box; }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e9f8f3;
            --blue: #2589c8;
            --blue-soft: #eef6ff;
            --red: #dc3545;
            --text: #182236;
            --muted: #758197;
            --border: #e6edf1;
            --bg: #f5f7fa;
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
            margin-bottom: 22px;
        }

        .summary-header {
            background: linear-gradient(120deg, rgba(223,250,242,.98), rgba(236,246,255,.98));
            border: 1px solid #dcefe8;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #daf8eb;
            color: #087d5a;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            background: #0fb179;
            border-radius: 50%;
        }

        .main-title {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .subtext {
            margin-top: 8px;
            color: #657387;
            font-size: 14px;
        }

        .status-chip {
            padding: 10px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            background: #fff1dd;
            color: #d77708;
        }

        .patient-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-top: 22px;
        }

        .patient-box {
            background: rgba(255,255,255,.72);
            border: 1px solid #e5efeb;
            border-radius: 16px;
            padding: 16px;
        }

        .label {
            color: #8a96a8;
            font-size: 12px;
            margin-bottom: 7px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .value {
            font-size: 16px;
            font-weight: 800;
            line-height: 1.5;
        }

        .section-title {
            font-size: 24px;
            font-weight: 800;
            margin: 0 0 20px;
        }

        .vitals-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .vital-card {
            background: linear-gradient(180deg, #ffffff 0%, #fbfcfd 100%);
            border: 1px solid #e6edf1;
            border-radius: 18px;
            padding: 20px;
        }

        .vital-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: var(--primary-soft);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }

        .vital-name {
            color: #7b8798;
            font-size: 13px;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .vital-value {
            font-size: 28px;
            font-weight: 800;
        }

        .vital-unit {
            font-size: 14px;
            color: #7b8798;
            font-weight: 700;
            margin-left: 4px;
        }

        .record-box {
            margin-top: 20px;
            background: #f7fafb;
            border: 1px solid #e8eef2;
            border-radius: 16px;
            padding: 18px;
            color: #5f6d7f;
            line-height: 1.8;
        }

        .record-box strong {
            color: #1d2940;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 18px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: .2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: var(--blue-soft);
            color: var(--blue);
            border: 1px solid #d4e7fb;
        }

        .btn-secondary:hover {
            background: var(--blue);
            color: white;
        }

        .btn-delete {
            background: white;
            color: var(--red);
            border: 1px solid #ee6b76;
        }

        .btn-delete:hover {
            background: var(--red);
            color: white;
        }

        @media(max-width: 980px) {
            .patient-grid,
            .vitals-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 700px) {
            .page { padding: 14px; }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .patient-grid,
            .vitals-grid {
                grid-template-columns: 1fr;
            }

            .main-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

@php
    $vital = $appointment->vitalSign;
@endphp

<div class="page">

    <div class="topbar">
        <div>
            <div class="title">Vital Signs Summary</div>
            <div class="subtitle">Review saved patient vitals before consultation</div>
        </div>

        <a href="{{ route('nurse.dashboard') }}" class="back-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
            Back to Dashboard
        </a>
    </div>

    <div class="card summary-header">
        <div class="header-top">
            <div>
                <div class="badge">
                    <span class="badge-dot"></span>
                    Nurse Checked
                </div>

                <h1 class="main-title">{{ $appointment->patient?->name ?? 'Unknown Patient' }}</h1>
                <div class="subtext">Patient vital summary recorded for doctor review</div>
            </div>

            <div class="status-chip">{{ ucfirst($appointment->status) }}</div>
        </div>

        <div class="patient-grid">
            <div class="patient-box">
                <div class="label">Token</div>
                <div class="value">#{{ $appointment->token_number }}</div>
            </div>

            <div class="patient-box">
                <div class="label">Doctor</div>
                <div class="value">{{ $appointment->doctor?->user?->name ?? 'Unknown Doctor' }}</div>
            </div>

            <div class="patient-box">
                <div class="label">Appointment Date</div>
                <div class="value">{{ $appointment->appointment_date }}</div>
            </div>

            <div class="patient-box">
                <div class="label">Reason for Visit</div>
                <div class="value">{{ $appointment->reason_for_visit }}</div>
            </div>
        </div>
    </div>

    @if($vital)
        <div class="card">
            <h2 class="section-title">Recorded Vital Signs</h2>

            <div class="vitals-grid">
                <div class="vital-card">
                    <div class="vital-icon">🌡</div>
                    <div class="vital-name">Temperature</div>
                    <div class="vital-value">{{ $vital->temperature }}<span class="vital-unit">°C</span></div>
                </div>

                <div class="vital-card">
                    <div class="vital-icon">🫀</div>
                    <div class="vital-name">Blood Pressure</div>
                    <div class="vital-value">
                        {{ $vital->systolic_bp }}/{{ $vital->diastolic_bp }}
                        <span class="vital-unit">mmHg</span>
                    </div>
                </div>

                <div class="vital-card">
                    <div class="vital-icon">♥</div>
                    <div class="vital-name">Pulse</div>
                    <div class="vital-value">{{ $vital->pulse }}<span class="vital-unit">bpm</span></div>
                </div>

                <div class="vital-card">
                    <div class="vital-icon">⚖</div>
                    <div class="vital-name">Weight</div>
                    <div class="vital-value">{{ $vital->weight }}<span class="vital-unit">kg</span></div>
                </div>
            </div>

            <div class="record-box">
                <strong>Recorded by:</strong>
                {{ $vital->nurse?->name ?? Auth::user()->name }}
                <br>
                <strong>Recorded at:</strong>
                {{ $vital->created_at ? $vital->created_at->format('Y-m-d h:i A') : 'Not available' }}
            </div>

            <div class="actions">
                <a href="{{ route('nurse.dashboard') }}" class="btn btn-primary">
                    Back to Dashboard
                </a>

                @if(strtolower($appointment->status) === 'waiting')
                    <form
                        method="POST"
                        action="{{ route('nurse.vitals.destroy', $appointment->id) }}"
                        onsubmit="return confirm('Are you sure you want to delete these vital signs?');"
                        style="margin:0;"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-delete">
                            Delete Vitals
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @else
        <div class="card">
            <h2 class="section-title">Recorded Vital Signs</h2>
            <div style="color:#7b8798;">No vital signs have been recorded for this patient yet.</div>
        </div>
    @endif

</div>
</body>
</html>