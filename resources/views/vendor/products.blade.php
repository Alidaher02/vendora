
<x-layout>
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 shrink-0 bg-[#0a0e16] border-r border-[#1f2530] flex flex-col">

        <!-- Store mini card -->
        <div class="mx-4 mt-4 p-4 rounded-lg card flex items-center gap-3">
            <div class="h-10 w-10 rounded-lg glow-icon flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-white">{{ $store?->name }}</p>
                <a href="#" class="text-xs text-blue-400 hover:underline inline-flex items-center gap-1">
                    View Store
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Nav -->
        <nav class="mt-6 px-3 flex-1">
            <p class="px-2 text-xs font-semibold text-gray-500 tracking-wider mb-2">MAIN</p>
            <ul class="space-y-1">
                <li><a href="vendor" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    Dashboard
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium bg-blue-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l2-4h14l2 4M3 7h18M3 7v11a2 2 0 002 2h14a2 2 0 002-2V7M9 11a3 3 0 006 0" /></svg>
                    Store
                </a></li>
                <li><a href="/products" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    Products
                </a></li>
                <li><a href="/categories" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <span class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                        Categories
                    </span>
                    <span class="text-xs font-semibold bg-red-500 text-white rounded-full px-1.5 py-0.5">12</span>
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-5.13a4 4 0 11-8 0 4 4 0 018 0zm6 3a4 4 0 10-3-6.65" /></svg>
                    Customers
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.539 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.57-1.838-.196-1.539-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                    Reviews
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    Analytics
                </a></li>
            </ul>

            <p class="px-2 text-xs font-semibold text-gray-500 tracking-wider mt-6 mb-2">SETTINGS</p>
            <ul class="space-y-1">
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    Store Settings
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    Payment Methods
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 13h13V7H3v6zm0 0v3a1 1 0 001 1h1m11-4h3.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V17a1 1 0 01-1 1h-1m-13 0a2 2 0 104 0m-4 0a2 2 0 114 0m9 0a2 2 0 104 0m-4 0a2 2 0 114 0" /></svg>
                    Shipping
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    Profile
                </a></li>
            </ul>
        </nav>

        <div class="p-3 border-t border-[#1f2530]">
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                Logout
            </a>
        </div>
    </aside>
    <div class="flex-1 flex flex-col min-w-0">

        <!-- Topbar -->


        <main class="flex-1 px-6 py-6 overflow-y-auto">


                      <button onclick="document.getElementById('add_product_modal').showModal()"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-3 py-2.5 text-sm font-semibold text-white cursor-pointer hover:bg-blue-700 transition-all mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Add New Product
                    </button>
<dialog id="add_product_modal" class="modal p-0 rounded-xl backdrop:bg-black/60">
    <div class="card rounded-xl p-6 w-[32rem] max-w-[90vw]">
        <h3 class="text-white text-xl font-bold">Add Product</h3>
        <p class="text-sm text-gray-400 mt-1">List a new item in your store.</p>

            <form
            id="addProductForm"
            onSubmit={submitHandler}
            enctype="multipart/form-data"
            class="space-y-5 mt-6"  
            >
            @csrf
                <div>
                    <label for="name" class="mb-2 text-gray-200 font-medium text-sm inline-block">Product name</label>
                    <input type="text" id="name" name="name" placeholder="e.g. Wireless Mouse" required
                        class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500" />
                </div>
                <div>
                    <x-forms.error name="name" />
                    <label for="description" class="mb-2 text-gray-200 font-medium text-sm inline-block">Description</label>
                    <textarea id="description" name="description" rows="3" placeholder="Short description of the product" required
                        class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500"></textarea>
                </div>
                            <x-forms.error name="description" />
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="price" class="mb-2 text-gray-200 font-medium text-sm inline-block">Price ($)</label>
                        <input type="number" step="0.01" min="0" id="price" name="price" placeholder="0.00" required
                            class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500" />
                    </div>
                                <x-forms.error name="price" />
                    <div>
                        <label for="stock" class="mb-2 text-gray-200 font-medium text-sm inline-block">Stock quantity</label>
                        <input type="number" min="0" id="stock" name="stock" placeholder="0" required
                            class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500" />
                    </div>
                                <x-forms.error name="stock" />
                </div>
                <div>
                    <label for="category" class="mb-2 text-gray-200 font-medium text-sm inline-block">Category</label>
                    <select id="category" name="category_id" required
                        class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="image" class="mb-2 text-gray-200 font-medium text-sm inline-block">Product image</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="text-sm text-gray-300 rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] file:mr-3 file:py-2 file:px-3 file:border-0 file:text-sm file:font-medium file:bg-[#1a1f2b] file:text-gray-200 hover:file:bg-[#232a38]" />
                </div>
                                        <x-forms.error name="image" />
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                        class="flex-1 py-2.5 text-sm rounded-lg font-semibold cursor-pointer text-white bg-blue-600 hover:bg-blue-700 transition-all">
                        Add Product
                    </button>
                    <button type="button" onclick="document.getElementById('add_product_modal').close()"
                        class="flex-1 py-2.5 text-sm rounded-lg font-semibold cursor-pointer text-gray-200 border border-[#2a3140] hover:bg-white/5">
                        Cancel
                    </button>
                </div>
            </form>
    </div>
</dialog>
<div class="overflow-hidden rounded-2xl border border-[#202938] bg-[#0b101a]">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-[#111827] border-b border-[#202938]">

                <tr class="text-left">

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Product
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Category
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Price
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Stock
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Status
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400 text-right">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody id="products" class="divide-y divide-[#202938]">

                @foreach($products as $product)


                    <x-product-card :product="$product" :categories="$categories" />

                    


                @endforeach

            </tbody>

        </table>

       <div>



 @if ($products->hasPages())

<div class="mt-10 flex flex-col sm:flex-row items-center justify-between 
            bg-[#10141f] border border-[#1f2530]
            rounded-xl px-5 py-4 gap-4">


    <!-- Results Info -->
    <div class="text-sm text-gray-400">

        Showing

        <span class="text-white font-semibold">
            {{ $products->firstItem() }}
        </span>

        -

        <span class="text-white font-semibold">
            {{ $products->lastItem() }}
        </span>

        of

        <span class="text-white font-semibold">
            {{ $products->total() }}
        </span>

        stores

    </div>



    <!-- Pagination -->
    <div class="flex items-center gap-2">


        {{-- Previous --}}
        @if ($products->onFirstPage())

            <span class="px-3 py-2 rounded-lg
                         bg-[#151b29]
                         text-gray-600
                         text-sm">
                ←
            </span>

        @else

            <a href="{{ $products->previousPageUrl() }}"
               class="px-3 py-2 rounded-lg
                      bg-[#151b29]
                      text-gray-300
                      hover:bg-blue-600
                      hover:text-white
                      transition text-sm">
                ←
            </a>

        @endif




        {{-- Pages --}}
        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)

            @if ($page == $products->currentPage())

                <span class="w-9 h-9 flex items-center justify-center
                             rounded-lg
                             bg-blue-600
                             text-white
                             text-sm
                             font-semibold
                             shadow-lg shadow-blue-600/20">
                    {{ $page }}
                </span>

            @else

                <a href="{{ $url }}"
                   class="w-9 h-9 flex items-center justify-center
                          rounded-lg
                          bg-[#151b29]
                          text-gray-400
                          hover:bg-blue-600
                          hover:text-white
                          transition text-sm">
                    {{ $page }}
                </a>

            @endif

        @endforeach





        {{-- Next --}}
        @if ($products->hasMorePages())

            <a href="{{ $products->nextPageUrl() }}"
               class="px-3 py-2 rounded-lg
                      bg-[#151b29]
                      text-gray-300
                      hover:bg-blue-600
                      hover:text-white
                      transition text-sm">
                →
            </a>

        @else

            <span class="px-3 py-2 rounded-lg
                         bg-[#151b29]
                         text-gray-600
                         text-sm">
                →
            </span>

        @endif


    </div>


</div>

@endif
</div>
       </div>

    </div>

</div>
</main>
</div>
</div>
</x-layout>