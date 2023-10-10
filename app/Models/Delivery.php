<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'sourceKladr',
        'targetKladr',
        'weight',
        'price',
        'period',
        'coefficient',
        'delivery_date',
        'error',
    ];
}
