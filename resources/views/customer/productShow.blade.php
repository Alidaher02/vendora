<x-customerLayout>
<div class="min-h-screen bg-[#070b14] text-white">

<div class="max-w-7xl mx-auto px-5 py-8">


<!-- Breadcrumb -->

<div class="flex items-center gap-2 text-xs text-gray-500 mb-6">

<a href="/products" class="hover:text-blue-400">Home</a>

<i class="fa-solid fa-chevron-right text-[10px]"></i>

<a href="/stores/{{$product->store->slug}}" class="hover:text-blue-400">
{{ $product->store->name }}
</a>

<i class="fa-solid fa-chevron-right text-[10px]"></i>

<span class="text-gray-300">
{{ $product->name }}
</span>

</div>



<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">


<!-- Images -->

<div class="lg:col-span-7">


<div class="flex gap-4">


{{-- <!-- thumbnails -->

<div class="flex flex-col gap-3">


@for($i = 0; $i < 4; $i++)

<img 
src="https://placehold.co/100"
class="w-16 h-16 rounded-lg object-cover cursor-pointer
border border-[#263044]
hover:border-blue-500 transition">

@endfor


</div> --}}



<!-- Main -->

<div class="flex-1 
bg-[#0d1422]
border border-[#1c2535]
rounded-2xl
overflow-hidden">


<img 
src="{{ asset('storage/'.$product->image) }}"
class="w-full h-[480px] object-cover">


</div>


</div>


</div>





<!-- Product Info -->

<div class="lg:col-span-5">


<div class="
sticky top-6
bg-[#0d1422]
border border-[#1c2535]
rounded-2xl
p-6">


<!-- Category -->

<p class="text-blue-400 text-xs uppercase tracking-widest font-semibold">

{{ $product->category->name }}

</p>



<!-- Name -->

<h1 class="
text-3xl
font-bold
mt-2">

{{ $product->name }}

</h1>



<!-- Store -->

<div class="flex items-center gap-2 mt-3 text-sm text-gray-400">

<i class="fa-solid fa-store text-blue-400"></i>

{{ $product->store->name }}
</div>




<!-- Rating -->

<div class="flex items-center gap-2 mt-4">

<span class="text-yellow-400">
★★★★★
</span>

<span class="text-sm text-gray-400">
4.9 (248)
</span>

</div>




<div class="border-t border-[#202a3b] my-5"></div>



<!-- Price -->

<div class="flex items-center gap-3">


<span class="text-3xl font-bold">

£{{ $product->price }}

</span>


{{-- <span class="text-gray-500 line-through text-sm">

£299

</span>


<span class="text-green-400 text-sm">

Save £50

</span> --}}


</div>



<!-- Stock -->

<div class="flex items-center gap-2 mt-5">


<span class="
w-2.5 h-2.5
rounded-full
bg-green-500">

</span>


<span class="text-green-400 text-sm">

{{ $product->status }}

</span>


</div>




<!-- Quantity -->

<div class="mt-6">


<p class="text-sm text-gray-400 mb-2">
Quantity
</p>


<div class="
flex items-center
w-fit
rounded-lg
overflow-hidden
border border-[#263044]
bg-[#080d18]
">


<button class="
w-10 h-10
hover:bg-[#182033]
">

-

</button>


<input 
value="1"
class="
w-12
h-10
text-center
bg-transparent
outline-none
">


<button class="
w-10 h-10
hover:bg-[#182033]
">

+

</button>


</div>


</div>





<!-- Buttons -->

<div class="grid grid-cols-1 gap-3 mt-6">

<button
onclick="addItemToaCart({{$product->id}})"
class="
w-full
rounded-lg cursor-pointer
py-3
bg-blue-600
hover:bg-blue-700
font-semibold
text-sm
transition">


<i class="fa-solid fa-cart-shopping mr-2"></i>

Add to Cart

</button>





</div>

<!-- Wishlist -->

<button
class="
w-full
mt-3
py-3
rounded-lg
border border-[#263044]
text-sm
text-gray-300
hover:border-red-500
hover:text-red-400
transition">


<i class="fa-regular fa-heart mr-2"></i>

Add to Wishlist


</button>





<!-- Benefits -->

<div class="border-t border-[#202a3b] mt-6 pt-5 space-y-4">



<div class="flex items-center gap-3">


<div class="
w-10 h-10
rounded-lg
bg-blue-500/10
flex items-center justify-center">


<i class="fa-solid fa-truck text-blue-400"></i>


</div>



<div>

<p class="text-sm font-semibold">

Free Shipping

</p>


<p class="text-xs text-gray-500">

Delivered in 2-4 days

</p>


</div>


</div>





<div class="flex items-center gap-3">


<div class="
w-10 h-10
rounded-lg
bg-green-500/10
flex items-center justify-center">


<i class="
fa-solid fa-arrow-rotate-left
text-green-400"></i>


</div>



<div>

<p class="text-sm font-semibold">

Easy Returns

</p>


<p class="text-xs text-gray-500">

30-day return policy

</p>


</div>


</div>






<div class="flex items-center gap-3">


<div class="
w-10 h-10
rounded-lg
bg-purple-500/10
flex items-center justify-center">


<i class="
fa-solid fa-shield-halved
text-purple-400"></i>


</div>



<div>

<p class="text-sm font-semibold">

Secure Payment

</p>


<p class="text-xs text-gray-500">

Encrypted checkout

</p>


</div>


</div>



</div>





<!-- Payment -->


<div class="
border-t border-[#202a3b]
mt-6
pt-5">


<p class="
text-xs
text-gray-500
mb-3">

We Accept

</p>



<div class="flex gap-2">


<div class="
px-3
py-2
rounded-lg
bg-[#080d18]
border border-[#263044]">


<i class="
fa-brands fa-cc-visa
text-xl">

</i>


</div>




<div class="
px-3
py-2
rounded-lg
bg-[#080d18]
border border-[#263044]">


<i class="
fa-brands fa-cc-mastercard
text-xl">

</i>


</div>





<div class="
px-3
py-2
rounded-lg
bg-[#080d18]
border border-[#263044]">


<i class="
fa-brands fa-paypal
text-xl">

</i>


</div>


</div>


</div>




</div>

</div>


</div>


</div>


</div>

<div id="messageBox"
     class="fixed bottom-5 right-5 hidden bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg transition">
</div>

</x-customerLayout>