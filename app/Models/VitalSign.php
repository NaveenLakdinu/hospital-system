<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'nurse_id',
        'temperature',
        'systolic_bp',
        'diastolic_bp',
        'pulse',
        'weight',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }
}
