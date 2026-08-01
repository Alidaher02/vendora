<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Enums\OrderStatus;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'total_price',
        'status',
        'recipient_name',
        'phone',
        'country',
        'city',
        'address',
        'notes'
    
    ];


    public function customer()
    {
        return $this->belongsTo(User::class , 'customer_id');
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
