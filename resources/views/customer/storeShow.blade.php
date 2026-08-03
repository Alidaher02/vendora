<x-customerLayout>

<div class="min-h-screen bg-[#0b1120] text-white">

    <!-- Header -->
    <section class="border-b border-[#1f2530] bg-[#10141f]">
        <div class="max-w-7xl mx-auto px-6 py-8">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <!-- Store Info -->
                <div class="flex items-center gap-5">

                    <img
                        src="{{ asset('storage/'.$store->image) }}"
                        class="w-20 h-20 rounded-2xl object-cover border border-[#2d3748]">

                    <div>

                        <h1 class="text-3xl font-bold">
                            {{ $store->name }}
                        </h1>

                        <p class="text-gray-400 mt-1">
                            {{ $store->description }}
                        </p>

                        <div class="flex items-center gap-5 mt-3 text-sm">

                            <div class="flex items-center gap-1 text-yellow-400">
                                ★★★★★
                                <span class="text-gray-300">
                                    4.9
                                </span>
                            </div>

                            <span class="text-gray-500">
                                •
                            </span>

                            <span class="text-gray-400">
                                0{{-- {{ $products->count() }} Products --}}
                            </span>

                            <span class="text-gray-500">
                                •
                            </span>
                        </div>

                    </div>

                </div>

                <!-- Search -->
<!-- Search -->

<div class="relative">

    <input 
        id="productSearch"
        type="text"
        placeholder="Search stores..."
        class="w-96 bg-[#10141f] border border-[#1f2530]
               rounded-xl px-4 py-2.5
               text-sm text-white
               placeholder-gray-500
               focus:outline-none focus:border-blue-500"
    >

    <div 
        id="productSearchResults" 
        class="hidden absolute left-0 top-full mt-3 w-96
               bg-[#0d111b]/95 backdrop-blur-xl
               border border-[#252d3d]
               rounded-2xl
               shadow-2xl shadow-black/40
               overflow-hidden
               z-50
               max-h-72
               overflow-y-auto">

    </div>

</div>


            </div>

        </div>
    </section>


    <!-- Categories -->
    <section class="max-w-7xl mx-auto px-6 pt-8">

        <div class="flex flex-wrap items-center gap-3">

            <select
                name="category"
                id="categoryFilter"
                class="bg-[#10141f]
                    border border-[#1f2530]
                    rounded-lg
                    px-4 py-2
                    text-sm
                    text-gray-300
                    focus:outline-none
                    focus:border-blue-500
                    transition"
                    onchange="filterByCategories(this.value)"
                    >

                    <option value="">All Categories</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>


            <div class="ml-auto">

                <select
                    class="bg-[#10141f]
                           border border-[#1f2530]
                           rounded-xl
                           px-4 py-2
                           text-sm
                           focus:outline-none"
                            onchange="filterProducts(this.value)"
                           >

                    <option value="latest">Newest</option>
                    <option value="low">Price: Low to High</option>
                    <option value="high">Price: High to Low</option>

                </select>

            </div>

        </div>


        <!-- Products Header -->

        <div class="flex items-center justify-between mt-10">

            <div>

                <h2 class="text-2xl font-bold">
                    Products
                </h2>


            </div>

        </div>


        <!-- Product Grid Starts Here -->

        <div id="productsContainer" data-store="{{ $store->id }}" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-7 mt-8">


        <!-- Product Card -->
{{-- 
        @foreach ($products as $product)
        
        <a href="/products/{{ $product->id }}" class="block">

    <div
        class="group bg-[#10141f]
               border border-[#1f2530]
               rounded-xl
               overflow-hidden
               hover:-translate-y-1
               hover:border-blue-500/40
               hover:shadow-xl
               hover:shadow-blue-500/10
               transition-all duration-300">

        <!-- Product Image -->
        <div class="relative overflow-hidden">

            <img
                src="{{ asset('storage/'.$product->image) }}"
                alt="{{ $product->name }}"
                class="w-full h-44 object-cover transition duration-500 group-hover:scale-105">

            <!-- Wishlist -->
            <button
                class="absolute top-3 right-3 w-8 h-8 rounded-full
                       bg-black/60 backdrop-blur
                       flex items-center justify-center
                       hover:bg-red-500 transition">

                <i class="fa-regular fa-heart text-white text-sm"></i>

            </button>

            <!-- Status -->
            <span
                class="absolute left-3 bottom-3
                       px-2.5 py-1
                       rounded-full
                       text-xs
                       bg-green-500/20
                       text-green-400">

                {{ ucfirst($product->status) }}

            </span>

        </div>

        <!-- Content -->
        <div class="p-4">

            <p class="text-[11px] uppercase tracking-widest text-blue-400 font-medium">
                {{ $product->category->name }}
            </p>

            <h3 class="mt-1 text-lg font-semibold text-white line-clamp-1 group-hover:text-blue-400 transition">
                {{ $product->name }}
            </h3>

            <p class="mt-2 text-sm text-gray-400 line-clamp-2">
                {{ $product->description }}
            </p>

            <div class="flex items-center justify-between mt-4">

                <div>
                    <p class="text-xl font-bold text-white">
                        ${{ $product->price }}
                    </p>

                    <p class="text-xs text-gray-500">
                        {{ $product->stock }} in stock
                    </p>
                </div>

                <span
                    class="px-4 py-2 rounded-lg
                           bg-blue-600
                           hover:bg-blue-700
                           text-sm font-medium
                           transition">

                    View

                </span>

            </div>

        </div>

    </div>

</a>

        @endforeach --}}

        <!-- Copy the product card above as many times as needed -->

    </div>

    <!-- Pagination -->



</section>

<!-- You May Also Like -->

<section class="border-t border-[#1f2530] bg-[#10141f] mt-10">

    <div class="max-w-7xl mx-auto px-6 py-14">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-2xl font-bold">
                    You May Also Like
                </h2>

                <p class="text-gray-400 mt-1">
                    Explore more products you might love.
                </p>

            </div>

            <a
                href="#"
                class="text-blue-400 hover:text-blue-300">

                View All →

            </a>

        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-10">

            <div class="h-56 rounded-2xl bg-[#0b1120] border border-[#1f2530]"></div>
            <div class="h-56 rounded-2xl bg-[#0b1120] border border-[#1f2530]"></div>
            <div class="h-56 rounded-2xl bg-[#0b1120] border border-[#1f2530]"></div>
            <div class="h-56 rounded-2xl bg-[#0b1120] border border-[#1f2530]"></div>

        </div>

    </div>

</section>

</div>






</x-customerLayout>