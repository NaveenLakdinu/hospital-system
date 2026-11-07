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
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
        }

        .error {
            color: red;
            margin-top: -15px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <a
        href="{{ route('doctor.consultation.show', $appointment->id) }}"
        class="back"
    >
        ← Back to Consultation
    </a>

    <div class="card">

        <h1>Create Prescription</h1>

        <div class="patient-info">

            <p>
                <strong>Patient:</strong>
                {{ $appointment->patient->name }}
            </p>

            <p>
                <strong>Reason:</strong>
                {{ $appointment->reason_for_visit }}
            </p>

        </div>

        <form
            method="POST"
            action="{{ route('doctor.prescription.store', $appointment->id) }}"
        >

            @csrf

            <label>Medicine Name</label>

            <input
                type="text"
                name="medicine_name"
                value="{{ old('medicine_name') }}"
                placeholder="Example: Paracetamol"
            >

            @error('medicine_name')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Dosage</label>

            <input
                type="text"
                name="dosage"
                value="{{ old('dosage') }}"
                placeholder="Example: 1 tablet"
            >


            <label>Frequency</label>

            <select name="frequency">

                <option value="">
                    Select frequency
                </option>

                <option value="Once a day">
                    Once a day
                </option>

                <option value="Twice a day">
                    Twice a day
                </option>

                <option value="3 times a day">
                    3 times a day
                </option>

                <option value="4 times a day">
                    4 times a day
                </option>

            </select>


            <label>Duration</label>

            <input
                type="text"
                name="duration"
                value="{{ old('duration') }}"
                placeholder="Example: 5 days"
            >


            <label>Instructions</label>

            <textarea
                name="instructions"
                placeholder="Example: Take after meals"
            >{{ old('instructions') }}</textarea>


            <button type="submit" class="btn">
                Save Prescription
            </button>

        </form>

    </div>

</div>

</body>
</html>