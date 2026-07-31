
<x-customerLayout>

<style>
  .field{ background:#161b27; border:1px solid #1f2530; }
</style>

<div class="px-4 md:px-8 py-6">
{{-- <div id="cartCount" class="text-2xl bg-white text-black w-24 h-24">--</div> --}}
  <div class="max-w-2xl mx-auto lg:max-w-5xl">

    <div class="mb-10">
      <h1 class="text-2xl font-bold text-white">Shopping Cart</h1>
      <p   class="text-sm text-gray-500 mt-1">Cart Items: <span class="cartCount"></span></p>
    </div>

    <div class="grid lg:grid-cols-3 lg:gap-x-8 gap-x-6 gap-y-8">

      <ul id="cartContainer" class="lg:col-span-2 space-y-4">

        <!-- items -->

      </ul>

      <!-- Order Summary -->
      <div class="md:sticky md:top-6 h-max">
        <div class="card rounded-lg px-4 py-6">
          <ul class="text-gray-400 font-medium space-y-3">
            <li class="flex gap-4 text-sm justify-between">Subtotal <span class="text-white"><span  class="total ml-auto text-white font-semibold font-mono"></span></span></li>
            <li class="flex gap-4 text-sm text-white pt-3 border-t border-[#1f2530] justify-between">Total <span class="text-white"><span class="total ml-auto font-semibold font-mono text-base"></span></span></li>
          </ul>

          <div id="cartEmpty" class="mt-6 grid grid-cols-1 space-y-3 text-center">
         @if($cartItems->isEmpty())
                    
        <i class="fa-solid fa-cart-shopping text-6xl text-gray-500"></i>

        <h2 class="mt-4 text-xl font-bold text-white">
            Your cart is empty
        </h2>

        <p class="mt-2 text-gray-400">
            Add products from your favorite stores.
        </p>

        <a href="/stores"
           class="inline-block mt-6 px-6 py-3 bg-indigo-600 rounded-lg text-white">
            Continue Shopping
        </a>
    </div>
     @else

         <a href="/checkout"  class="w-full px-4 py-2.5 cursor-pointer text-white text-sm font-semibold rounded-md glow-icon hover:opacity-90 transition">
                                  Checkout
        </a>
        <a href="/stores/" class="inline-block text-[#7fa1ff] text-sm font-semibold hover:text-white transition">Continue Shopping</a>


    @endif
          </div>

          <hr class="my-6 border-[#1f2530]">

          <form class="space-y-2">
            <label for="promocode" class="block text-sm font-medium text-gray-300">Have a promo code?</label>
            <div class="flex gap-2">
              <input type="text" id="promocode" placeholder="Enter code"
                class="field px-3 py-2 text-sm text-gray-200 rounded-md w-full placeholder-gray-600 focus:outline-none focus:border-[#4f7cff]">
              <button type="submit" class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-[#4f7cff] hover:bg-[#3d68e8] transition shrink-0">
                Apply
              </button>
            </div>
          </form>
        </div>


    </div>
  </div>
</div>

<div id="deleteMessage"
     class="fixed bottom-5 right-5 hidden bg-red-600 text-white px-5 py-3 rounded-lg shadow-lg transition">
</div>
<div id="noStock"
     class="fixed bottom-5 right-5 hidden bg-red-600 text-white px-5 py-3 rounded-lg shadow-lg transition">
</div>

</x-customerLayout>
