<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'image',
        'title',
        'description',
        'cost_price',
        'sell_price',
        'stock',
    ];
}
