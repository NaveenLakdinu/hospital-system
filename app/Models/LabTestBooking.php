<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTestBooking extends Model
{
    use HasFactory;

    protected $table = 'lab_test_bookings';

    protected $fillable = [
        'user_id',
        'reference_no',
        'test_name',
        'category',
        'booking_date',
        'status',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];
}
