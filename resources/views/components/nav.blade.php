        
        <header class="flex items-center justify-between px-6 py-4 border-b border-[#1f2530]">
       <a class="text-xl font-bold text-white hover:bg-transparent">
            <span class="text-blue-600">Ven</span>dora
        </a>

    @auth
    
            <div class="flex items-center gap-5">
                    @if (Auth::user()->role === App\Enums\UserRole::CUSTOMER)
<a href="/store/cart"
   class="group relative flex items-center justify-center 
          w-12 h-12 rounded-2xl
          bg-white/5 backdrop-blur-md
          border border-white/10
          text-white
          hover:bg-white/10
          hover:border-white/20
          transition-all duration-300">

    <!-- Cart SVG -->
    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.8"
         stroke="currentColor"
         class="w-6 h-6 group-hover:scale-110 transition">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25h9.75c.621 0 1.117-.512 1.064-1.13l-.75-8.25H5.106M7.5 14.25L6.375 18h11.25M7.5 14.25l-.75-3h13.5M9 21a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm8 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
    </svg>


    <!-- Count -->
    <span class="cartCount absolute -top-2 -right-2
                 flex items-center justify-center
                 min-w-[22px] h-[22px]
                 px-1
                 rounded-full
                 bg-gradient-to-r from-blue-500 to-indigo-600
                 text-white text-[11px] font-bold
                 shadow-lg shadow-blue-500/30
                 border border-[#0b1120]">
        0
    </span>

</a>
                    @endif
                <button class="relative text-gray-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                    <span class="absolute -top-1.5 -right-1.5 text-[10px] font-semibold bg-red-500 text-white rounded-full h-4 w-4 flex items-center justify-center">3</span>
                </button>
                <div class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-full glow-icon flex items-center justify-center text-sm font-bold text-white">
                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-blue-400">{{ auth()->user()->role }}</p>
                    </div>
            <form action="/logout" method="POST">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm font-medium text-red-400 transition-all hover:bg-red-500 hover:text-white hover:border-red-500">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H9m4 8H7a2 2 0 01-2-2V6a2 2 0 012-2h6" />
                </svg>

                Logout
            </button>
            </form>
                </div>
            </div>

@endauth            
        </header>




