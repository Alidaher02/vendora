<x-customerLayout title="Checkout">

    @php
        $items = $items ?? [
            ['name' => 'Ceramic pour-over set', 'vendor' => 'Nomi Home', 'qty' => 1, 'price' => 48.00],
            ['name' => 'Insulated travel mug', 'vendor' => 'Nomi Home', 'qty' => 2, 'price' => 22.00],
            ['name' => 'Whole bean coffee, 500g', 'vendor' => 'Roast & Co', 'qty' => 1, 'price' => 19.50],
        ];
        $subtotal = $subtotal ?? collect($items)->sum(fn ($i) => $i['price'] * $i['qty']);
        $shipping = $shipping ?? 8.00;
        $tax = $tax ?? round($subtotal * 0.05, 2);
        $total = $total ?? $subtotal + $shipping + $tax;

        $steps = [
            ['label' => 'Cart', 'done' => true],
            ['label' => 'Shipping', 'done' => true],
            ['label' => 'Payment', 'done' => false, 'current' => true],
            ['label' => 'Confirm', 'done' => false],
        ];
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">

        {{-- Header --}}
        <div class="mb-8">
            <p class="text-sm text-gray-500">Vendora / Cart / <span class="text-gray-300">Checkout</span></p>
            <h1 class="text-2xl sm:text-3xl font-semibold text-white mt-1">Checkout</h1>
        </div>

        {{-- Route-style progress tracker --}}
        <div class="card rounded-xl p-5 sm:p-6 mb-8 overflow-x-auto">
            <div class="flex items-center min-w-[560px] sm:min-w-0">
                @foreach ($steps as $i => $step)
                    <div class="flex items-center {{ !$loop->last ? 'flex-1' : '' }}">
                        <div class="flex flex-col items-center gap-2 shrink-0">
                            <div @class([
                                'w-10 h-10 rounded-full flex items-center justify-center shrink-0 transition-colors',
                                'glow-icon' => $step['done'] || ($step['current'] ?? false),
                                'bg-[#0a0e16] border border-[#1f2530] text-gray-500' => !$step['done'] && !($step['current'] ?? false),
                            ])>
                                @if ($step['done'])
                                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                @elseif ($step['current'] ?? false)
                                    <span class="w-2.5 h-2.5 rounded-full bg-white"></span>
                                @else
                                    <span class="text-xs font-medium">{{ $i + 1 }}</span>
                                @endif
                            </div>
                            <span @class([
                                'text-xs font-medium whitespace-nowrap',
                                'text-white' => $step['done'] || ($step['current'] ?? false),
                                'text-gray-500' => !$step['done'] && !($step['current'] ?? false),
                            ])>{{ $step['label'] }}</span>
                        </div>
                        @if (!$loop->last)
                            <div class="flex-1 h-px mx-2 sm:mx-4 mt-[-20px] {{ $step['done'] ? 'bg-gradient-to-r from-[#4f7cff] to-[#8b5cf6]' : '' }}"
                                 style="{{ $step['done'] ? '' : 'border-top: 1px dashed #1f2530; height:0;' }}"></div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Mobile order summary toggle --}}
        <details class="lg:hidden card rounded-xl mb-6 group">
            <summary class="list-none flex items-center justify-between p-4 cursor-pointer select-none">
                <span class="flex items-center gap-2 text-sm font-medium text-white">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M16 10a4 4 0 01-8 0" />
                    </svg>
                    Order summary
                </span>
                <span class="flex items-center gap-2">
                    <span class="text-sm font-semibold text-white">${{ number_format($total, 2) }}</span>
                    <svg class="w-4 h-4 text-gray-500 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </summary>
            <div class="px-4 pb-4 border-t border-[#1f2530] pt-4">
                <div class="space-y-4 mb-5">
                    @foreach ($items as $item)
                        <div class="flex items-start gap-3">
                            <div class="w-12 h-12 rounded-lg bg-[#0a0e16] border border-[#1f2530] shrink-0 flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-200 truncate">{{ $item['name'] }}</p>
                                <p class="text-xs text-gray-500">{{ $item['vendor'] }} · Qty {{ $item['qty'] }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-200 shrink-0">${{ number_format($item['price'] * $item['qty'], 2) }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="flex gap-2 mb-5">
                    <input type="text" placeholder="Promo code"
                        class="flex-1 bg-[#0a0e16] border border-[#1f2530] rounded-lg px-3.5 py-2 text-sm text-gray-200 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-[#4f7cff] focus:border-transparent transition" />
                    <button type="button" class="px-4 py-2 rounded-lg border border-[#1f2530] text-sm font-medium text-gray-300 hover:bg-[#0a0e16] transition">Apply</button>
                </div>

                <div class="space-y-2.5 pt-4 border-t border-[#1f2530] text-sm">
                    <div class="flex justify-between text-gray-400"><span>Subtotal</span><span class="text-gray-200">${{ number_format($subtotal, 2) }}</span></div>
                    <div class="flex justify-between text-gray-400"><span>Shipping</span><span class="text-gray-200">${{ number_format($shipping, 2) }}</span></div>
                    <div class="flex justify-between text-gray-400"><span>Tax</span><span class="text-gray-200">${{ number_format($tax, 2) }}</span></div>
                    <div class="flex justify-between pt-2.5 mt-1 border-t border-[#1f2530]">
                        <span class="text-sm font-semibold text-white">Total</span>
                        <span class="text-base font-semibold text-white">${{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <button type="submit" class="w-full mt-6 py-3 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                    style="background: linear-gradient(135deg, #4f7cff, #8b5cf6);">
                    Place order
                </button>
                <p class="text-xs text-gray-600 text-center mt-3">By placing your order, you agree to Vendora's Terms & Refund Policy.</p>
            </div>
        </details>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 items-start">



            {{-- Right: order summary (sticky on desktop) --}}
            <div class="hidden lg:block lg:sticky lg:top-6">
                <div class="card rounded-xl p-5 sm:p-6">
                    <h2 class="text-base font-semibold text-white mb-5">Order summary</h2>

                    <div id="checkoutContainer" class="space-y-4 mb-5">

                    </div>

                    <div class="flex gap-2 mb-5">
                        <input type="text" placeholder="Promo code"
                            class="flex-1 bg-[#0a0e16] border border-[#1f2530] rounded-lg px-3.5 py-2 text-sm text-gray-200 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-[#4f7cff] focus:border-transparent transition" />
                        <button type="button" class="px-4 py-2 rounded-lg border border-[#1f2530] text-sm font-medium text-gray-300 hover:bg-[#0a0e16] transition">Apply</button>
                    </div>

                    <div class="space-y-2.5 pt-4 border-t border-[#1f2530] text-sm">
                        <div class="flex justify-between text-gray-400"><span>Subtotal</span><span class="text-base font-semibold text-white" ><span class="total"></span></span></div>
                        <div class="flex justify-between text-gray-400"><span>Shipping</span><span class="text-gray-200">${{ number_format($shipping, 2) }}</span></div>
                        <div class="flex justify-between pt-2.5 mt-1 border-t border-[#1f2530]">
                            <span class="text-sm font-semibold text-white">Total</span>
                            <span class="total">
                            
                            </span>
                        </div>
                    </div>

                    <button onclick="order()"  class="w-full cursor-pointer mt-6 py-3 rounded-lg text-sm font-semibold text-white transition hover:opacity-90"
                        style="background: linear-gradient(135deg, #4f7cff, #8b5cf6);">
                        Place order
                    </button>
                    <p class="text-xs text-gray-600 text-center mt-3">By placing your order, you agree to Vendora's Terms & Refund Policy.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="orderMessage"
     class="fixed bottom-5 right-5 hidden bg-green-500 text-white px-5 py-3 rounded-lg shadow-lg transition">
    </div>

</x-customerLayout>