
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorMedicineNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_name',
        'patient_name',
        'medicine_details',
        'quantity',
        'instructions',
        'received_at',
        'status',
    ];

    protected $casts = [
        'received_at' => 'datetime',
    ];
}