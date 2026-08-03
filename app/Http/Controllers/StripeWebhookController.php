<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {

        $event = $request->all();


        if($event['type'] == 'payment_intent.succeeded')
        {

            $paymentIntent = $event['data']['object'];


            $payment = Payment::where(
                'stripe_payment_id',
                $paymentIntent['id']
            )->first();



            if($payment)
            {

                $payment->update([
                    'status' => 'paid'
                ]);


                // $payment->order->update([
                //     'status' => 'confirmed'
                // ]);


            }

        }


        return response()->json([
            'received' => true
        ]);

    }
}