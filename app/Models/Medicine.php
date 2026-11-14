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
        'stock_quantity',
        'price',
    ];

    protected $attributes = [
        'category' => 'General',
        'stock_quantity' => 0,
    ];

    protected static function booted(): void
    {
        static::saving(function (Medicine $medicine) {
            if (!is_null($medicine->stock_qty)) {
                $medicine->stock_quantity = $medicine->stock_qty;
            }
        });
    }
}