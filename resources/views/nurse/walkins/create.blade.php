<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Walk-in Patient</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e7f8f2;

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
            max-width: 900px;
            margin: auto;
            padding: 28px;
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
        }

        .title {
            font-size: 21px;
            font-weight: 800;
        }

        .subtitle {
            margin-top: 5px;
            color: var(--muted);
            font-size: 13px;
        }

        .back {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;

            background: #effaf5;

            padding: 10px 14px;

            border: 1px solid #ccebdd;
            border-radius: 10px;
        }

        .hero {
            background:
                linear-gradient(
                    120deg,
                    #e5faf3,
                    #edf7ff
                );

            border: 1px solid #dcefe8;
            border-radius: 22px;

            padding: 28px;

            margin-bottom: 22px;
        }

        .badge {
            display: inline-block;

            background: #d9f8eb;
            color: #087a59;

            border-radius: 100px;

            padding: 7px 11px;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 12px;
        }

        .hero h1 {
            margin: 0;
            font-size: 29px;
        }

        .hero p {
            color: #657387;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .card {
            background: white;

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 26px;

            box-shadow: 0 8px 30px rgba(31,41,55,.04);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            font-weight: 700;

            margin-bottom: 8px;
        }

        select,
        textarea {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #dbe3e8;
            border-radius: 11px;

            font-family: Arial, sans-serif;
            font-size: 14px;

            background: #fbfcfd;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        select:focus,
        textarea:focus {
            outline: none;

            border-color: #93d5be;

            box-shadow:
                0 0 0 4px rgba(10,147,104,.08);
        }

        .error {
            color: #dc3545;
            font-size: 13px;
            margin-top: 6px;
        }

        .btn {
            border: 0;

            background: var(--primary);
            color: white;

            padding: 12px 18px;

            border-radius: 10px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
        }

        .btn:hover {
            background: var(--primary-dark);
        }
    </style>

</head>

<body>

<div class="page">

    <div class="topbar">

        <div>
            <div class="title">
                Add Walk-in Patient
            </div>

            <div class="subtitle">
                Add a patient who arrived without a prior appointment
            </div>
        </div>

        <a
            href="{{ route('nurse.dashboard') }}"
            class="back"
        >
            ← Dashboard
        </a>

    </div>


    <div class="hero">

        <span class="badge">
            WALK-IN PATIENT
        </span>

        <h1>
            Add Patient to Today's Queue
        </h1>

        <p>
            Select the patient and doctor. The patient will receive
            the next available token for today.
        </p>

    </div>


    <div class="card">

        <form
            method="POST"
            action="{{ route('nurse.walkins.store') }}"
        >

            @csrf


            <div class="form-group">

                <label for="patient_id">
                    Patient
                </label>

                <select
                    name="patient_id"
                    id="patient_id"
                    required
                >

                    <option value="">
                        Select Patient
                    </option>

                    @foreach($patients as $patient)

                        <option
                            value="{{ $patient->id }}"
                            {{ old('patient_id') == $patient->id ? 'selected' : '' }}
                        >
                            {{ $patient->name }} — {{ $patient->email }}
                        </option>

                    @endforeach

                </select>

                @error('patient_id')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label for="doctor_id">
                    Doctor
                </label>

                <select
                    name="doctor_id"
                    id="doctor_id"
                    required
                >

                    <option value="">
                        Select Doctor
                    </option>

                    @foreach($doctors as $doctor)

                        <option
                            value="{{ $doctor->id }}"
                            {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}
                        >

                            {{ $doctor->user?->name }}

                            @if($doctor->specialization)
                                — {{ $doctor->specialization }}
                            @endif

                        </option>

                    @endforeach

                </select>

                @error('doctor_id')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label for="reason_for_visit">
                    Reason for Visit
                </label>

                <textarea
                    name="reason_for_visit"
                    id="reason_for_visit"
                    placeholder="Enter reason for visit..."
                    required
                >{{ old('reason_for_visit') }}</textarea>

                @error('reason_for_visit')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <button
                type="submit"
                class="btn"
            >
                + Add to Today's Queue
            </button>

        </form>

    </div>

</div>

</body>

</html>