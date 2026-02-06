<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'year',
        'horsepower',
        'torque',
        'acceleration',
        'top_speed',
        'description',
        'badge',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'year' => 'integer',
        'horsepower' => 'integer',
    ];
}
