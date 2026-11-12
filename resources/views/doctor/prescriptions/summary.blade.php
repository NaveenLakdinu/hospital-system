<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prescription Summary</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section h3 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
        }

        .medicine {
            background: #f8f9fa;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            margin-right: 10px;
        }

        .btn-secondary {
            background: #6c757d;
        }
    </style>
</head>

<body>

<div class="container">

    @if(session('success'))
        <div class="success">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <h1>Prescription Summary</h1>

        <div class="section">

            <h3>Patient Details</h3>

            <p>
                <strong>Patient:</strong>
                {{ $prescription->patient->name }}
            </p>

            <p>
                <strong>Appointment:</strong>
                {{ $prescription->appointment->appointment_number }}
            </p>

        </div>


        <div class="section">

            <h3>Consultation Details</h3>

            <p>
                <strong>Diagnosis:</strong>
                {{ $prescription->consultation->diagnosis }}
            </p>

            <p>
                <strong>Consultation Notes:</strong>
                {{ $prescription->consultation->consultation_notes ?? 'No notes added' }}
            </p>

        </div>


        <div class="section">

            <h3>Medicines</h3>

            @foreach($prescription->items as $item)

                <div class="medicine">

                    <p>
                        <strong>Medicine:</strong>
                        {{ $item->medicine_name }}
                    </p>

                    <p>
                        <strong>Dosage:</strong>
                        {{ $item->dosage }}
                    </p>

                    <p>
                        <strong>Frequency:</strong>
                        {{ $item->frequency }}
                    </p>

                    <p>
                        <strong>Duration:</strong>
                        {{ $item->duration }}
                    </p>

                    <p>
                        <strong>Instructions:</strong>
                        {{ $item->instructions ?? 'No special instructions' }}
                    </p>

                </div>

            @endforeach

        </div>


        <a
            href="{{ route('doctor.dashboard') }}"
            class="btn"
        >
            Back to Dashboard
        </a>

    </div>

</div>

</body>
</html>