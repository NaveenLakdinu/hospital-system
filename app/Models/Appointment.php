<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_number',
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'token_number',
        'reason_for_visit',
        'status',
        'is_walk_in',
        'consultation_started_at',
    ];

    protected $casts = [
    'appointment_date' => 'date',
    'is_walk_in' => 'boolean',
    'consultation_started_at' => 'datetime',

];

    /**
     * Get the patient (User) who booked the appointment.
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * Get the doctor for this appointment.
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function prescription()
{
    return $this->hasOne(Prescription::class, 'appointment_id');
}
public function vitalSign()
{
    return $this->hasOne(
        VitalSign::class
    );
}

}
