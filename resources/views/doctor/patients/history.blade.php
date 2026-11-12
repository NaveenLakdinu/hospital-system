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

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            background:
                radial-gradient(circle at top left, #dff9f1 0%, transparent 30%),
                radial-gradient(circle at top right, #eef4ff 0%, transparent 30%),
                #f5f7fa;

            color: #172033;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            color: #198754;
            background: #eef8f4;

            border: 1px solid #cdeadd;
            border-radius: 9px;

            padding: 10px 15px;

            text-decoration: none;
            font-weight: 600;

            transition: 0.2s ease;
        }

        .back:hover {
            background: #198754;
            color: white;
        }

        .patient-card {
            background: linear-gradient(120deg, #e9fbf4, #eef7ff);

            padding: 25px;
            border-radius: 18px;

            margin-bottom: 22px;
        }

        .patient-card h1 {
            margin: 0 0 8px;
        }

        .patient-email {
            color: #718096;
        }

        .section-title {
            font-size: 21px;
            font-weight: 700;

            margin: 25px 0 16px;
        }

        .history-card {
            background: white;

            border: 1px solid #edf0f3;
            border-radius: 16px;

            padding: 22px;

            margin-bottom: 18px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.03);
        }

        .history-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding-bottom: 15px;
            border-bottom: 1px solid #eee;

            margin-bottom: 17px;
        }

        .visit-date {
            color: #198754;
            font-weight: 700;
        }

        .label {
            color: #7b8795;
            font-size: 12px;

            margin-bottom: 5px;
        }

        .value {
            font-weight: 600;
            margin-bottom: 17px;
        }

        .medicine-box {
            background: #f5faf8;
            border-radius: 10px;

            padding: 14px;
            margin-top: 10px;
        }

        .medicine-name {
            font-weight: 700;
            color: #087c59;

            margin-bottom: 8px;
        }

        .medicine-details {
            color: #667085;
            font-size: 14px;

            line-height: 1.7;
        }

        .empty {
            background: white;
            padding: 35px;

            border-radius: 15px;

            text-align: center;
            color: #7b8795;
        }
    </style>

</head>

<body>

<div class="container">

    <!-- BACK BUTTON -->

    <div class="top">

        @if(!empty($currentAppointmentId))

           <div class="top">

    <a
        href="{{ route(
            'doctor.consultation.show',
            $currentAppointment->id
        ) }}"
        class="back"
    >
        ← Back to Patient Consultation
    </a>

</div>

        @else

            <a
                href="{{ route('doctor.dashboard') }}"
                class="back"
            >
                ← Back to Dashboard
            </a>

        @endif

    </div>


    <!-- PATIENT DETAILS -->

    <div class="patient-card">

        <h1>
            {{ $patient->name }}
        </h1>

        <div class="patient-email">
            {{ $patient->email }}
        </div>

    </div>


    <div class="section-title">
        Medical History
    </div>


    <!-- HISTORY -->

    @forelse($consultations as $consultation)

        <div class="history-card">

            <div class="history-header">

                <strong>
                    Consultation
                </strong>

                <span class="visit-date">

                    @if($consultation->appointment)

                        {{ $consultation->appointment->appointment_date }}

                    @else

                        {{ $consultation->created_at->format('Y-m-d') }}

                    @endif

                </span>

            </div>


            <!-- Diagnosis -->

            <div class="label">
                Diagnosis
            </div>

            <div class="value">
                {{ $consultation->diagnosis }}
            </div>


            <!-- Notes -->

            <div class="label">
                Consultation Notes
            </div>

            <div class="value">
                {{ $consultation->consultation_notes ?? 'No notes recorded.' }}
            </div>


            <!-- Prescription -->

            <div class="label">
                Prescription
            </div>


            @if($consultation->prescription)

                @forelse($consultation->prescription->items as $item)

                    <div class="medicine-box">

                        <div class="medicine-name">
                            {{ $item->medicine_name }}
                        </div>

                        <div class="medicine-details">

                            <strong>Dosage:</strong>
                            {{ $item->dosage }}

                            <br>

                            <strong>Frequency:</strong>
                            {{ $item->frequency }}

                            <br>

                            <strong>Duration:</strong>
                            {{ $item->duration }}

                            <br>

                            <strong>Instructions:</strong>
                            {{ $item->instructions ?? 'No special instructions' }}

                        </div>

                    </div>

                @empty

                    <div class="value">
                        No medicine items recorded.
                    </div>

                @endforelse

            @else

                <div class="value">
                    No prescription recorded.
                </div>

            @endif

        </div>

    @empty

        <div class="empty">
            No previous medical history available for this patient.
        </div>

    @endforelse

</div>

</body>

</html>