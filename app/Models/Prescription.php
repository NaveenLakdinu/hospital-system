<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'consultation_id',
        'doctor_id',
        'patient_id',
        'instructions',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');

    }
    public function items()
{
    return $this->hasMany(PrescriptionItem::class);
}
}