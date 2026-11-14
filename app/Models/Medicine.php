<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'dosage_form',
        'stock_qty',
        'price',
    ];

    protected $attributes = [
        'category' => 'General',
    ];
}