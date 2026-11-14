<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'pharmacy_name',
        'contact_number',
        'address',
        'email',
        'avatar',
    ];
}