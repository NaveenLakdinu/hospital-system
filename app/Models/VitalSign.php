<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    protected $fillable = [

        'appointment_id',

        'nurse_id',

        'temperature',

        'systolic_bp',

        'diastolic_bp',

        'pulse',

        'weight',

    ];


    /**
     * Appointment
     */
    public function appointment()
    {
        return $this->belongsTo(
            Appointment::class
        );
    }


    /**
     * Nurse who recorded vitals
     */
    public function nurse()
    {
        return $this->belongsTo(
            User::class,
            'nurse_id'
        );
    }


    /**
     * Return abnormal vital names
     */
    public function abnormalFlags(): array
    {
        $flags = [];


        /*
        |--------------------------------------------------------------------------
        | Temperature
        |--------------------------------------------------------------------------
        */

        if (
            $this->temperature < 36 ||
            $this->temperature > 37.5
        ) {
            $flags[] = 'Temperature';
        }


        /*
        |--------------------------------------------------------------------------
        | Systolic BP
        |--------------------------------------------------------------------------
        */

        if (
            $this->systolic_bp < 90 ||
            $this->systolic_bp > 140
        ) {
            $flags[] = 'Systolic BP';
        }


        /*
        |--------------------------------------------------------------------------
        | Diastolic BP
        |--------------------------------------------------------------------------
        */

        if (
            $this->diastolic_bp < 60 ||
            $this->diastolic_bp > 90
        ) {
            $flags[] = 'Diastolic BP';
        }


        /*
        |--------------------------------------------------------------------------
        | Pulse
        |--------------------------------------------------------------------------
        */

        if (
            $this->pulse < 60 ||
            $this->pulse > 100
        ) {
            $flags[] = 'Pulse';
        }


        return $flags;
    }


    /**
     * Check if any vital requires review
     */
    public function hasAbnormalVitals(): bool
    {
        return count(
            $this->abnormalFlags()
        ) > 0;
    }
}