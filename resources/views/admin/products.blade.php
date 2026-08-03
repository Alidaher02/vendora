<x-adminLayout title="Products">

<div class="min-h-screen p-6 bg-[#0a0e16]">

    <div class="mx-auto mt-5 max-w-7xl overflow-hidden rounded-2xl border border-[#1f2530] bg-[#111827] shadow-xl">


        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#1f2530] px-6 py-5">

            <div>
                <h1 class="text-lg font-bold text-white">
                    Products
                </h1>

                <p class="text-xs text-gray-500">
                    Manage all marketplace products
                </p>
            </div>


            <div class="rounded-lg bg-blue-500/10 px-4 py-2 text-sm font-semibold text-blue-400">
                {{ $products->count() }} Products
            </div>

        </div>



        <!-- Table -->
        <div class="p-6">

            <div class="overflow-hidden rounded-xl border border-[#1f2530]">

                <table class="w-full text-left">

                    <thead class="bg-[#0a0e16]">

                        <tr>

                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Product
                            </th>

                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Store
                            </th>

                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Price
                            </th>

                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Stock
                            </th>

                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>

                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500 text-right">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-[#1f2530]">


                    @forelse($products as $product)

                    <tr class="transition hover:bg-white/5">


                        <!-- Product -->
                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">


                                <div class="h-10 w-10 flex items-center justify-center rounded-lg bg-blue-500/10 text-blue-400">
                                <img
                                    src="{{ asset('storage/'.$product->image) }}"
                                    alt="{{ $product->name }}"
                                    class=" rounded-xl object-cover border border-[#2d3748]">
                                </div>


                                <div>

                                    <p class="text-sm font-semibold text-white">
                                        {{ $product->name }}
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        {{ $product->category->name ?? 'No Category' }}
                                    </p>

                                </div>


                            </div>

                        </td>



                        <!-- Store -->
                        <td class="px-5 py-4">

                            <p class="text-sm text-gray-300">
                                {{ $product->store->name ?? 'Unknown' }}
                            </p>

                        </td>



                        <!-- Price -->
                        <td class="px-5 py-4">

                            <p class="text-sm font-semibold text-white">
                                ${{ number_format($product->price,2) }}
                            </p>

                        </td>



                        <!-- Stock -->
                        <td class="px-5 py-4">

                            <span class="text-sm text-gray-300">
                                {{ $product->stock }}
                            </span>

                        </td>



                        <!-- Status -->
                        <td class="px-5 py-4">

                            @if($product->status == 'in_stock')

                                <span class="rounded-full bg-green-500/10 px-3 py-1 text-xs font-semibold text-green-400">
                                    In Stock
                                </span>

                            @else

                                <span class="rounded-full bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-400">
                                    Out Of Stock
                                </span>

                            @endif

                        </td>



                        <!-- Actions -->
                        <td class="px-5 py-4">

                            <div class="flex justify-end gap-2">

                                <a href="#"
                                class="rounded-lg border border-[#2b3443] px-3 py-1.5 text-xs font-semibold text-gray-300 hover:bg-white/5">
                                    View
                                </a>


                                <a href="#"
                                class="rounded-lg bg-blue-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-blue-700">
                                    Edit
                                </a>


                            </div>

                        </td>


                    </tr>


                    @empty

                    <tr>
                        <td colspan="6"
                        class="px-5 py-10 text-center text-sm text-gray-500">
                            No products found.
                        </td>
                    </tr>

                    @endforelse


                    </tbody>

                </table>

            </div>

        </div>

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


</x-adminLayout>