<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Dashboard</title>

 <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background: #ffffff;
            position: fixed;
            padding: 25px;
            box-sizing: border-box;
            border-right: 1px solid #ddd;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2b7a78;
            margin-bottom: 40px;
        }

        .menu {
            margin-bottom: 20px;
            color: #555;
            font-size: 15px;
        }

        .menu.active {
            color: #2b7a78;
            font-weight: bold;
        }

        .main {
            margin-left: 230px;
            padding: 35px;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            flex: 1;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .card-number {
            font-size: 28px;
            font-weight: bold;
            margin-top: 10px;
        }

        .table-container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            text-align: left;
            color: #777;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .token {
            background: #e6f5f3;
            color: #21867a;
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: bold;
        }

        .waiting {
            background: #fff3cd;
            color: #9a7000;
            padding: 7px 12px;
            border-radius: 20px;
        }

        .completed {
            background: #d4edda;
            color: #27823b;
            padding: 7px 12px;
            border-radius: 20px;
        }

        .btn {
            background: #2b7a78;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 7px;
            font-size: 14px;
        }

        .btn:hover {
            background: #205e5c;
        }

        .disabled {
            background: #ccc;
            pointer-events: none;
        }

    </style>


<body>

<div class="sidebar">

    <div class="logo">
        MediCare24
    </div>

    <div class="menu active">
        Dashboard
    </div>

    <div class="menu">
        Today's Patients
    </div>

    <div class="menu">
        Prescriptions
    </div>

    <div class="menu">
        Patient History
    </div>

</div>


<div class="main">

    <h1>Doctor Dashboard</h1>

    <div class="subtitle">
        Welcome Doctor. Here is today's patient queue.
    </div>


    <div class="cards">

        <div class="card">
            Today's Patients

            <div class="card-number">
                {{ count($appointments) }}
            </div>

        </div>


        <div class="card">

            Waiting Patients

            <div class="card-number">

                {{ collect($appointments)->where('status', 'Waiting')->count() }}

            </div>

        </div>


        <div class="card">

            Completed

            <div class="card-number">

                {{ collect($appointments)->where('status', 'Completed')->count() }}

            </div>

        </div>

    </div>


    <div class="table-container">

        <h2>Today's Patient Queue</h2>

        <table>

            <thead>

            <tr>

                <th>Token</th>

                <th>Patient</th>

                <th>Age / Gender</th>

                <th>Reason</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

            </thead>


            <tbody>

            @foreach($appointments as $appointment)

                <tr>

                    <td>

                        <span class="token">

                            #{{ $appointment['token'] }}

                        </span>

                    </td>


                    <td>

                        {{ $appointment['name'] }}

                    </td>


                    <td>

                        {{ $appointment['age'] }}
                        /
                        {{ $appointment['gender'] }}

                    </td>


                    <td>

                        {{ $appointment['reason'] }}

                    </td>


                    <td>

                        @if($appointment['status'] == 'Waiting')

                            <span class="waiting">
                                Waiting
                            </span>

                        @else

                            <span class="completed">
                                Completed
                            </span>

                        @endif

                    </td>


                    <td>

                        @if($appointment['status'] == 'Waiting')

                            <a
                                href="{{ route('doctor.prescription.create', $appointment['id']) }}"
                                class="btn">

                                Start Consultation

                            </a>

                        @else

                            <span class="btn disabled">

                                Completed

                            </span>

                        @endif

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>

</html>