<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Prescription</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        .patient-info {
            background: #eef8f7;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .patient-info p {
            margin: 8px 0;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        textarea {
            min-height: 100px;
        }

        .btn {
            background: #198754;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background: #157347;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #198754;
            font-weight: bold;
        }

        .error {
            color: red;
            margin-top: -15px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <a
        href="{{ route('doctor.consultation.show', $consultation->appointment_id) }}"
        class="back"
    >
        ← Back to Consultation
    </a>

    <div class="card">

        <h1>Create Prescription</h1>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="patient-info">

            <p>
                <strong>Patient:</strong>
                {{ $consultation->appointment->patient->name }}
            </p>

            <p>
                <strong>Reason for Visit:</strong>
                {{ $consultation->appointment->reason_for_visit }}
            </p>

            <p>
                <strong>Diagnosis:</strong>
                {{ $consultation->diagnosis }}
            </p>

            <p>
                <strong>Consultation Notes:</strong>
                {{ $consultation->consultation_notes ?? 'No notes added' }}
            </p>

        </div>

        <form
            method="POST"
            action="{{ route('doctor.prescription.store', $consultation->id) }}"
        >

            @csrf

            <label for="medicine_name">
                Medicine Name
            </label>

            <input
                id="medicine_name"
                type="text"
                name="medicine_name"
                value="{{ old('medicine_name') }}"
                placeholder="Example: Paracetamol"
                required
            >

            @error('medicine_name')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror


            <label for="dosage">
                Dosage
            </label>

            <input
                id="dosage"
                type="text"
                name="dosage"
                value="{{ old('dosage') }}"
                placeholder="Example: 1 tablet"
                required
            >

            @error('dosage')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror


            <label for="frequency">
                Frequency
            </label>

            <select
                id="frequency"
                name="frequency"
                required
            >

                <option value="">
                    Select frequency
                </option>

                <option
                    value="Once a day"
                    {{ old('frequency') == 'Once a day' ? 'selected' : '' }}
                >
                    Once a day
                </option>

                <option
                    value="Twice a day"
                    {{ old('frequency') == 'Twice a day' ? 'selected' : '' }}
                >
                    Twice a day
                </option>

                <option
                    value="3 times a day"
                    {{ old('frequency') == '3 times a day' ? 'selected' : '' }}
                >
                    3 times a day
                </option>

                <option
                    value="4 times a day"
                    {{ old('frequency') == '4 times a day' ? 'selected' : '' }}
                >
                    4 times a day
                </option>

            </select>

            @error('frequency')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror


            <label for="duration">
                Duration
            </label>

            <input
                id="duration"
                type="text"
                name="duration"
                value="{{ old('duration') }}"
                placeholder="Example: 5 days"
                required
            >

            @error('duration')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror


            <label for="instructions">
                Instructions
            </label>

            <textarea
                id="instructions"
                name="instructions"
                placeholder="Example: Take after meals"
            >{{ old('instructions') }}</textarea>

            @error('instructions')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror


            <button
                type="submit"
                class="btn"
            >
                Save Prescription
            </button>

        </form>

    </div>

</div>

</body>
</html>