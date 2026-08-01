        
        <header class="flex items-center justify-between px-6 py-4 border-b border-[#1f2530]">
       <a class="text-xl font-bold text-white hover:bg-transparent">
            <span class="text-blue-600">Ven</span>dora
        </a>

    @auth
    
    <div class="flex items-center gap-3">
     <div>
    <a href="/stores"
       class="inline-flex items-center gap-2 rounded-xl border border-[#1f2530]
              bg-[#0a0e16] px-5 py-3 text-sm font-semibold text-gray-200
              transition duration-300 hover:border-[#4f7cff]
              hover:bg-[#111827] hover:text-white">

        <svg class="h-5 w-5 text-[#4f7cff]"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor"
             stroke-width="2">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 10h18M5 6h14l2 4H3l2-4zM5 10v10h14V10"/>

        </svg>

        Stores

    </a>
</div>
    <!-- Cart -->
    <a href="/store/cart"
       class="group relative flex items-center justify-center
              w-12 h-12 rounded-xl
              bg-white/5 border border-white/10
              hover:bg-blue-500/10
              hover:border-blue-500/30
              transition-all duration-200">

        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 24 24"
             stroke-width="1.8"
             stroke="currentColor"
             class="w-6 h-6 text-gray-300 group-hover:text-white group-hover:scale-110 transition">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25h9.75c.621 0 1.117-.512 1.064-1.13l-.75-8.25H5.106M7.5 14.25L6.375 18h11.25M7.5 14.25l-.75-3h13.5M9 21a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm8 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"/>
        </svg>

        <span class="cartCount absolute -top-1.5 -right-1.5
                     flex items-center justify-center
                     w-5 h-5 rounded-full
                     bg-blue-600 text-[11px] font-bold text-white">
            0
        </span>
    </a>

    <!-- Orders -->
    <a href="/orders"
       class="group relative flex items-center justify-center
              w-12 h-12 rounded-xl
              bg-white/5 border border-white/10
              hover:bg-blue-500/10
              hover:border-blue-500/30
              transition-all duration-200">

        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 24 24"
             stroke-width="1.8"
             stroke="currentColor"
             class="w-6 h-6 text-gray-300 group-hover:text-white group-hover:scale-110 transition">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 3h6a2 2 0 012 2h2a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a2 2 0 012-2h2m0 0a2 2 0 002 2h2a2 2 0 002-2"/>
        </svg>

        <span id="orderCount" class="absolute -top-1.5 -right-1.5
                     flex items-center justify-center
                     w-5 h-5 rounded-full
                     bg-indigo-600 text-[11px] font-bold text-white">
            0
        </span>
    </a>


     <div class="flex items-center gap-3"> 
     <div class="h-9 w-9 rounded-full glow-icon flex items-center justify-center text-sm font-bold text-white"> {{ strtoupper(substr(Auth::user()->name,0,1)) }} </div>
      <div class="text-right">
       <p class="text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
        <p class="text-xs text-blue-400">{{ auth()->user()->role }}</p>
         </div> 
         <form action="/logout" method="POST"> @csrf @method('DELETE') 
         <button type="submit" class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm font-medium text-red-400 transition-all hover:bg-red-500 hover:text-white hover:border-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H9m4 8H7a2 2 0 01-2-2V6a2 2 0 012-2h6" /> </svg>
           Logout 
           </button>
            </form>
             </div>
              </div>

    </div>

    

@endauth            
        </header>




