<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = [
        'order_id',
        'payment_method',
        'stripe_payment_id',
        'amount',
        'status',
    ];

    public function order()
    {
        $this->belongsTo(Order::class);
    }
}
