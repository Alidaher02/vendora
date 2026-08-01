<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Access\Response;



class OrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function updateOrDelete(User $user , Order $order): bool
    {
        return $order->customer_id === $user->id;
    }
}
