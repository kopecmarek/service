<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'client_id',
        'password',
        'price',
        'total',
        'type',
        'brand',
        'model'
    ];
}
