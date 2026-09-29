<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialization',
        'license_number',
        'qualification',
        'consultation_fee',
        'room_number',
        'bio',
    ];

    /**
     * Get the user account for the doctor.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the schedules for the doctor.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(DoctorSchedule::class);
    }
}
