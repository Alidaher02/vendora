<x-customerLayout title="Customer">

<div class="px-6 py-8">


    <!-- Header -->

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-2xl font-bold text-white">
                Explore Stores
            </h1>

            <p class="text-gray-400 text-sm mt-1">
                Discover stores and shop your favorite products
            </p>
        </div>


<!-- Search -->
<div class="relative">

    <input 
        id="storeSearch"
        type="text"
        placeholder="Search stores..."
        class="w-96 bg-[#10141f] border border-[#1f2530]
               rounded-xl px-4 py-2.5
               text-sm text-white
               placeholder-gray-500
               focus:outline-none focus:border-blue-500"
    >

    <div 
        id="searchResults" 
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


    <!-- Stores Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


        @foreach ($stores as $store)

        <div class="bg-[#10141f] border border-[#1f2530] rounded-xl 
                    overflow-hidden hover:border-blue-500/40 
                    hover:shadow-lg hover:shadow-blue-500/10
                    transition duration-300">


            <!-- Store Cover -->
            <div class="h-24 relative bg-[#151b29]">

                <img 
                    src="{{ asset('storage/'.$store->image) }}"
                    class="w-full h-full object-cover"
                >


                <!-- Logo -->
                <div class="absolute -bottom-6 left-4">

                    <img 
                        src="{{ asset('storage/'.$store->image) }}"
                        class="w-14 h-14 rounded-xl object-cover
                               border-4 border-[#10141f]
                               shadow-lg"
                    >

                </div>


            </div>




            <div class="p-4 pt-9">


                <!-- Name -->
                <div class="flex justify-between items-center">


                    <h3 class="text-white font-semibold text-sm truncate">
                        {{ $store->name }}
                    </h3>


                    <div class="flex items-center gap-1">
                        <span class="text-yellow-400 text-xs">
                            ★
                        </span>

                        <span class="text-gray-300 text-xs">
                            4.8
                        </span>
                    </div>


                </div>




                <!-- Description -->
                <p class="text-gray-400 text-xs mt-3 line-clamp-2 leading-relaxed">
                    {{ $store->description }}
                </p>




                <!-- Footer -->
                <div class="flex justify-between items-center mt-5">


                    <div>

                        <p class="text-gray-500 text-xs">
                            Products
                        </p>

                        <p class="text-white text-sm font-semibold">
                            {{ $store->products()->count() }}
                        </p>

                    </div>



                    <a href="/stores/{{$store->slug}}"
                       class="px-4 py-2 rounded-lg
                              bg-blue-600 hover:bg-blue-700
                              text-white text-xs font-medium
                              transition">

                        Visit Store

                    </a>


                </div>



            </div>


        </div>




        @endforeach


    </div>  

  @if ($stores->hasPages())

<div class="mt-10 flex flex-col sm:flex-row items-center justify-between 
            bg-[#10141f] border border-[#1f2530]
            rounded-xl px-5 py-4 gap-4">


    <!-- Results Info -->
    <div class="text-sm text-gray-400">

        Showing

        <span class="text-white font-semibold">
            {{ $stores->firstItem() }}
        </span>

        -

        <span class="text-white font-semibold">
            {{ $stores->lastItem() }}
        </span>

        of

        <span class="text-white font-semibold">
            {{ $stores->total() }}
        </span>

        stores

    </div>



    <!-- Pagination -->
    <div class="flex items-center gap-2">


        {{-- Previous --}}
        @if ($stores->onFirstPage())

            <span class="px-3 py-2 rounded-lg
                         bg-[#151b29]
                         text-gray-600
                         text-sm">
                ←
            </span>

        @else

            <a href="{{ $stores->previousPageUrl() }}"
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
        @foreach ($stores->getUrlRange(1, $stores->lastPage()) as $page => $url)

            @if ($page == $stores->currentPage())

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
        @if ($stores->hasMorePages())

            <a href="{{ $stores->nextPageUrl() }}"
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

</x-customerLayout>