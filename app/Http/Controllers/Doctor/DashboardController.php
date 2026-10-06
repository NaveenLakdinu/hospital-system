<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

class DoctorController extends Controller
{

    public function dashboard()
    {
        $appointments = [
            [
                'id' => 1,
                'token' => 1,
                'name' => 'Kamal Perera',
                'age' => 35,
                'gender' => 'Male',
                'reason' => 'Fever and headache',
                'status' => 'Waiting',
            ],
            [
                'id' => 2,
                'token' => 2,
                'name' => 'Nimali Silva',
                'age' => 27,
                'gender' => 'Female',
                'reason' => 'Chest pain',
                'status' => 'Waiting',
            ],
            [
                'id' => 3,
                'token' => 3,
                'name' => 'Sunil Fernando',
                'age' => 42,
                'gender' => 'Male',
                'reason' => 'Back pain',
                'status' => 'Completed',
            ],
        ];
           return view('doctor.dashboard', compact('appointments'));
    }
}