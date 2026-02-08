<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // fillable
    protected $fillable = [
        'user_id',
        'tran_id',
        'amount',
        'currency',
        'status',
        'payment_info',
    ];

    protected $casts = [
        'payment_info' => 'array',
    ];
}
