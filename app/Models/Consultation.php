<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'doctor_id',
        'patient_id',
        'diagnosis',
        'consultation_notes',
    ];

    public function appointment()
    {
        return $this->belongsTo(
            Appointment::class,
            'appointment_id'
        );
    }

    public function doctor()
    {
        return $this->belongsTo(
            Doctor::class,
            'doctor_id'
        );
    }

    public function patient()
    {
        return $this->belongsTo(
            User::class,
            'patient_id'
        );
    }

    public function prescription()
    {
        return $this->hasOne(
            Prescription::class,
            'consultation_id'
        );
    }
}