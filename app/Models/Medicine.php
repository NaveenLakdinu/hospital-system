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
        'unit_price',
        'expiry_date',
    ];

    protected $attributes = [
        'category' => 'General',
        'stock_quantity' => 0,
        'unit_price' => 0.00,
    ];

    // පැරණි rows වල stock_qty 0 නම් stock_quantity අගය ලබා ගැනීම
    public function getDisplayStockAttribute()
    {
        return $this->stock_qty > 0 ? $this->stock_qty : ($this->stock_quantity ?? 0);
    }

    // පැරණි rows වල price 0 නම් unit_price අගය ලබා ගැනීම
    public function getDisplayPriceAttribute()
    {
        return $this->price > 0 ? $this->price : ($this->unit_price ?? 0);
    }

    protected static function booted(): void
    {
        static::saving(function (Medicine $medicine) {
            if (!is_null($medicine->stock_qty)) {
                $medicine->stock_quantity = $medicine->stock_qty;
            }
            if (!is_null($medicine->price)) {
                $medicine->unit_price = $medicine->price;
            }
            if (empty($medicine->expiry_date)) {
                $medicine->expiry_date = now()->addYears(2)->format('Y-m-d');
            }
        });
    }
}