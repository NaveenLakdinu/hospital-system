<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Nurse Dashboard
     */
   public function index(Request $request)
{
    $search = trim($request->get('search', ''));
    $sort = $request->get('sort', 'token');

    /*
    |--------------------------------------------------------------------------
    | Include yesterday + today + future appointments
    |--------------------------------------------------------------------------
    */

    $query = Appointment::with([
        'patient',
        'doctor.user',
        'vitalSign',
    ])
        ->whereDate(
            'appointment_date',
            '>=',
            now()->subDay()->toDateString()
        );


    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    if ($search !== '') {

        $query->where(function ($q) use ($search) {

            $q->where(
                'appointment_number',
                'like',
                "%{$search}%"
            )

            ->orWhereHas(
                'patient',
                function ($patientQuery) use ($search) {

                    $patientQuery
                        ->where(
                            'name',
                            'like',
                            "%{$search}%"
                        )
                        ->orWhere(
                            'email',
                            'like',
                            "%{$search}%"
                        );
                }
            );
        });
    }


    /*
    |--------------------------------------------------------------------------
    | Sort
    |--------------------------------------------------------------------------
    */

    $query->orderBy(
        'appointment_date',
        'asc'
    );


    if ($sort === 'time') {

        $query
            ->orderBy(
                'appointment_time',
                'asc'
            )
            ->orderBy(
                'token_number',
                'asc'
            );

    } else {

        $query
            ->orderBy(
                'token_number',
                'asc'
            )
            ->orderBy(
                'appointment_time',
                'asc'
            );
    }


    $appointments = $query->get();


    return view(
        'nurse.dashboard',
        compact(
            'appointments',
            'search',
            'sort'
        )
    );
}

    /**
     * Nurse Profile
     */
    public function profile()
    {
        return view('nurse.profile');
    }
}