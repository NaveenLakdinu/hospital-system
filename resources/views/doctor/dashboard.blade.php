<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #f8f9fa;
        }

        .waiting {
            color: #d58a00;
            font-weight: bold;
        }

        .completed {
            color: green;
            font-weight: bold;
        }

        .btn {
            background: #198754;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>

</head>

<body>

<div class="container">

    <h1>Doctor Dashboard</h1>

    <p class="subtitle">
        Today's Patient Queue
    </p>

    <div class="card">

        <table>

            <thead>
                <tr>
                    <th>Token No</th>
                    <th>Patient Name</th>
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
                        #{{ $appointment['token'] }}
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

                            <a href="#" class="btn">
                                Start Consultation
                            </a>

                        @else

                            Completed

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