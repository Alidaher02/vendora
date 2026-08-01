<x-customerLayout title="Checkout">

    @php

        $items = $items ?? [
            [
                'name' => 'Ceramic pour-over set',
                'vendor' => 'Nomi Home',
                'qty' => 1,
                'price' => 48.00
            ],

            [
                'name' => 'Insulated travel mug',
                'vendor' => 'Nomi Home',
                'qty' => 2,
                'price' => 22.00
            ],

            [
                'name' => 'Whole bean coffee, 500g',
                'vendor' => 'Roast & Co',
                'qty' => 1,
                'price' => 19.50
            ],
        ];


        $subtotal = $subtotal ?? collect($items)
            ->sum(fn($i) => $i['price'] * $i['qty']);


        $shipping = $shipping ?? 8.00;


        $tax = $tax ?? round($subtotal * 0.05,2);


        $total = $total ?? $subtotal + $shipping + $tax;



        $steps = [

            [
                'label'=>'Cart',
                'done'=>true
            ],

            [
                'label'=>'Shipping',
                'done'=>true
            ],

            [
                'label'=>'Payment',
                'done'=>false,
                'current'=>true
            ],

            [
                'label'=>'Confirm',
                'done'=>false
            ]

        ];

    @endphp



<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">



    {{-- Header --}}

    <div class="mb-8">


        <p class="text-sm text-gray-500">

            Vendora / Cart /

            <span class="text-gray-300">
                Checkout
            </span>

        </p>



        <h1 class="text-2xl sm:text-3xl font-semibold text-white mt-1">

            Checkout

        </h1>


    </div>





    {{-- Progress Tracker --}}


    <div class="card rounded-xl p-5 sm:p-6 mb-8 overflow-x-auto">


        <div class="flex items-center min-w-[560px] sm:min-w-0">


            @foreach($steps as $i => $step)


                <div class="flex items-center {{ !$loop->last ? 'flex-1':'' }}">



                    <div class="flex flex-col items-center gap-2 shrink-0">


                        <div @class([

                            'w-10 h-10 rounded-full flex items-center justify-center shrink-0 transition',

                            'glow-icon' => $step['done'] || ($step['current'] ?? false),

                            'bg-[#0a0e16] border border-[#1f2530] text-gray-500'
                            => !$step['done'] && !($step['current'] ?? false)

                        ])>


                            @if($step['done'])


                                <svg class="w-5 h-5 text-white"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2.5">


                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>


                                </svg>



                            @elseif($step['current'] ?? false)


                                <span class="w-2.5 h-2.5 rounded-full bg-white"></span>



                            @else


                                <span class="text-xs font-medium">

                                    {{ $i+1 }}

                                </span>



                            @endif


                        </div>





                        <span @class([

                            'text-xs font-medium whitespace-nowrap',

                            'text-white'
                            => $step['done'] || ($step['current'] ?? false),

                            'text-gray-500'
                            => !$step['done'] && !($step['current'] ?? false)

                        ])>


                            {{ $step['label'] }}


                        </span>



                    </div>






                    @if(!$loop->last)


                        <div class="flex-1 h-px mx-2 sm:mx-4 mt-[-20px]

                        {{ $step['done']
                        ? 'bg-gradient-to-r from-[#4f7cff] to-[#8b5cf6]'
                        : '' }}"

                        style="{{ $step['done']
                        ? ''
                        : 'border-top:1px dashed #1f2530;height:0;' }}">


                        </div>



                    @endif




                </div>



            @endforeach



        </div>



    </div>

{{-- Mobile Order Summary --}}

<details class="lg:hidden card rounded-xl mb-6 group">


    <summary class="list-none flex items-center justify-between p-4 cursor-pointer select-none">


        <span class="flex items-center gap-2 text-sm font-medium text-white">


            <svg class="w-4 h-4 text-gray-400"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6z"/>

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M3 6h18M16 10a4 4 0 01-8 0"/>

            </svg>


            Order summary


        </span>




        <span class="flex items-center gap-2">


            <span class="total text-sm font-semibold text-white">


            </span>



            <svg class="w-4 h-4 text-gray-500 transition-transform group-open:rotate-180"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">


                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19 9l-7 7-7-7"/>


            </svg>


        </span>


    </summary>





    <div class="px-4 pb-4 border-t border-[#1f2530] pt-4">



        <div id="mobileCheckoutContainer"
             class="space-y-4 mb-5">


        </div>





        <div class="space-y-2.5 pt-4 border-t border-[#1f2530] text-sm">


            <div class="flex justify-between text-gray-400">

                <span>
                    Subtotal
                </span>


                <span class="total text-gray-200">


                </span>


            </div>




            <div class="flex justify-between text-gray-400">


                <span>
                    Shipping
                </span>


                <span class="text-gray-200">

                    ${{number_format($shipping,2)}}

                </span>


            </div>





            <div class="flex justify-between text-gray-400">


                <span>
                    Tax
                </span>


                <span class="text-gray-200">

                    ${{number_format($tax,2)}}

                </span>


            </div>





            <div class="flex justify-between pt-3 border-t border-[#1f2530]">


                <span class="font-semibold text-white">

                    Total

                </span>


                <span class="font-semibold text-white total">


                </span>


            </div>



        </div>



    </div>



</details>








{{-- Desktop Layout --}}


<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 items-start">





{{-- TOP SUMMARY --}}


<div class="lg:col-span-1 order-4">


<div class="card rounded-xl p-5 sm:p-6">


<h2 class="text-base font-semibold text-white mb-5">

Order summary

</h2>





<div id="checkoutContainer"
     class="space-y-4 mb-5">


</div>





<div class="flex gap-2 mb-5">


<input type="text"
       placeholder="Promo code"
       class="flex-1 bg-[#0a0e16]
       border border-[#1f2530]
       rounded-lg px-3.5 py-2
       text-sm text-gray-200
       focus:outline-none
       focus:ring-2
       focus:ring-[#4f7cff]">



<button class="px-4 py-2 rounded-lg
border border-[#1f2530]
text-sm text-gray-300">

Apply

</button>


</div>





<div class="space-y-2.5 pt-4 border-t border-[#1f2530] text-sm">


<div class="flex justify-between text-gray-400">

<span>
Subtotal
</span>


<span class="text-white font-semibold">

<span class="total"></span>

</span>




</div>




<div class="flex justify-between text-gray-400">

<span>
Shipping
</span>


<span>

${{number_format($shipping,2)}}

</span>


</div>




<div class="flex justify-between pt-3 border-t border-[#1f2530]">


<span class="font-semibold text-white">

Total

</span>


<span class="total text-white font-semibold">

</span>




</div>


<button id="placeOrderBtn"
        type="submit"
        form="OrderForm"
        class="w-full rounded-lg py-3
        text-sm font-semibold text-white
        transition hover:opacity-90 cursor-pointer  "
        style="background:linear-gradient(135deg,#4f7cff,#8b5cf6)">


Place Order


</button>


</div>


</div>


</div>

     
     {{-- SHIPPING FORM --}}


<div class="lg:col-span-1 order-2">


<form id="OrderForm"
      onsubmit="order(event)"
      class="card rounded-xl p-5 sm:p-6">



<div class="flex items-center gap-3 mb-5">


<div class="flex h-10 w-10 items-center justify-center rounded-xl"
     style="background:linear-gradient(135deg,#4f7cff,#8b5cf6)">



<svg xmlns="http://www.w3.org/2000/svg"
     fill="none"
     viewBox="0 0 24 24"
     stroke-width="1.8"
     stroke="currentColor"
     class="w-5 h-5 text-white">


<path stroke-linecap="round"
      stroke-linejoin="round"
      d="M3 7.5h13.5L19 12h2v4.5h-2.5M3 7.5v9h2.5m0 0a2 2 0 104 0m-4 0h4m7.5 0a2 2 0 104 0"/>


</svg>


</div>




<div>

<h2 class="text-base font-semibold text-white">
Shipping Details
</h2>

<p class="text-xs text-gray-500">
Delivery information
</p>

</div>


</div>





<div class="space-y-4">


<div>


<label class="text-xs text-gray-400 mb-1.5 block">
Recipient name
</label>


<input id="recipient_name"
       name="recipient_name"
       required
       type="text"
       class="w-full bg-[#0a0e16]
       border border-[#1f2530]
       rounded-lg px-3.5 py-2.5
       text-sm text-gray-200
       focus:ring-2 focus:ring-[#4f7cff]
       focus:outline-none">

</div>





<div>

<label class="text-xs text-gray-400 mb-1.5 block">
Phone number
</label>


<input id="phone"
       name="phone"
       required
       type="tel"
       class="w-full bg-[#0a0e16]
       border border-[#1f2530]
       rounded-lg px-3.5 py-2.5
       text-sm text-gray-200
       focus:ring-2 focus:ring-[#4f7cff]
       focus:outline-none">

</div>






<div class="grid grid-cols-2 gap-3">


<div>


<label class="text-xs text-gray-400 mb-1.5 block">
Country
</label>


<input id="country"
       name="country"
       required
       class="w-full bg-[#0a0e16]
       border border-[#1f2530]
       rounded-lg px-3.5 py-2.5
       text-sm text-gray-200
       focus:ring-2 focus:ring-[#4f7cff]
       focus:outline-none">


</div>





<div>


<label class="text-xs text-gray-400 mb-1.5 block">
City
</label>


<input id="city"
       name="city"
       required
       class="w-full bg-[#0a0e16]
       border border-[#1f2530]
       rounded-lg px-3.5 py-2.5
       text-sm text-gray-200
       focus:ring-2 focus:ring-[#4f7cff]
       focus:outline-none">


</div>


</div>








<div>

<label class="text-xs text-gray-400 mb-1.5 block">
Street address
</label>


<input id="address"
       name="address"
       required
       class="w-full bg-[#0a0e16]
       border border-[#1f2530]
       rounded-lg px-3.5 py-2.5
       text-sm text-gray-200
       focus:ring-2 focus:ring-[#4f7cff]
       focus:outline-none">


</div>





<div>


<label class="text-xs text-gray-400 mb-1.5 block">

Notes

<span class="text-gray-600">(optional)</span>

</label>



<textarea id="notes"
          name="notes"
          rows="2"
          class="w-full bg-[#0a0e16]
          border border-[#1f2530]
          rounded-lg px-3.5 py-2.5
          text-sm text-gray-200
          resize-none
          focus:ring-2 focus:ring-[#4f7cff]
          focus:outline-none"></textarea>


</div>





<p id="formError"
   class="hidden text-xs text-red-400 text-center">

</p>



</div>



</form>


</div>


{{-- PAYMENT --}}


<div class="lg:col-span-1 order-3">


<div class="card rounded-xl p-5 sm:p-6">



<div class="flex items-center gap-3 mb-5">


<div class="flex h-10 w-10 items-center justify-center rounded-xl"
style="background:linear-gradient(135deg,#4f7cff,#8b5cf6)">



<svg class="w-5 h-5 text-white"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M3 10h18M7 15h2m4 0h4M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z"/>

</svg>


</div>




<div>

<h2 class="text-base font-semibold text-white">
Payment
</h2>


<p class="text-xs text-gray-500">
Secure payment powered by Stripe
</p>


</div>


</div>







<div class="space-y-4">



<label class="flex items-center gap-3
border border-[#1f2530]
bg-[#0a0e16]
rounded-lg
p-4">


<input type="radio"
       name="payment_method"
       value="stripe"
       checked
       class="accent-blue-500">



<div>


<p class="text-sm text-white font-medium">
Credit Card
</p>


<p class="text-xs text-gray-500">
Visa, Mastercard and more
</p>


</div>


</label>







<div>


<label class="text-xs text-gray-400 mb-1.5 block">
Card Details
</label>




<div id="card-element"

class="w-full bg-[#0a0e16]
border border-[#1f2530]
rounded-lg
px-3.5 py-3
text-sm text-gray-200

focus-within:ring-2
focus-within:ring-[#4f7cff]">

</div>




<p id="card-error"
class="hidden text-xs text-red-400 mt-2">

</p>



</div>





</div>




</div>


</div>





</div>






<div id="orderMessage"
     class="fixed bottom-5 right-5 hidden
     bg-green-500 text-white
     px-5 py-3 rounded-lg shadow-lg">

</div>


</div>


<script src="https://js.stripe.com/v3/"></script>

</x-customerLayout>