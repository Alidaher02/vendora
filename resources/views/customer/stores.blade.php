<x-layout title="Customer">

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

    <script>
const storeSearch = document.getElementById("storeSearch");
const searchResults = document.getElementById("searchResults");

storeSearch.addEventListener("input", function(){

    let value = this.value.trim();

    if(value.length < 1)
    {
        searchResults.innerHTML = "";
        searchResults.classList.add("hidden");
        return;
    }

    fetch(`/stores/search?search=${encodeURIComponent(value)}`)
        .then(res => res.json())
        .then(stores => {

            if(stores.length === 0)
            {
                searchResults.innerHTML = `
                    <div class="px-4 py-4 text-center text-sm text-gray-400">
                        <i class="fa-solid fa-store-slash mb-2 text-gray-500"></i>
                        <p>No stores found</p>
                    </div>
                `;

                searchResults.classList.remove("hidden");
                return;
            }


            searchResults.innerHTML = stores.map(store => `

                <a href="/stores/${store.slug}" 
                   class="block">

                    <div class="w-full px-4 py-3
                                border-b border-[#1f2530]
                                transition-all duration-200
                                hover:bg-[#182033]">

                        <div class="flex items-center justify-between">

                            <div>
                                <h3 class="text-sm font-medium text-white">
                                    ${store.name}
                                </h3>

                                <p class="text-xs text-gray-500 mt-1">
                                    Visit store
                                </p>
                            </div>


                            <img
                                src="/storage/${store.image}"
                                alt="${store.name}"
                                class="w-10 h-10 rounded-lg object-cover 
                                       border border-[#2d3748]">
                            
                        </div>

                    </div>

                </a>

            `).join("");

            searchResults.classList.remove("hidden");

        });

});
    </script>


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


</div>

</x-layout>