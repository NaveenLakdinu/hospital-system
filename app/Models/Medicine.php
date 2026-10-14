<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
   protected $fillable = ['name', 'category', 'stock_quantity', 'unit_price', 'expiry_date'];
}
