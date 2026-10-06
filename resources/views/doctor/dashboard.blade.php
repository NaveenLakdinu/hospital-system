<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Dashboard</title>



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