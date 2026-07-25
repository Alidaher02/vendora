        
        <header class="flex items-center justify-between px-6 py-4 border-b border-[#1f2530]">
       <a class="text-xl font-bold text-white hover:bg-transparent">
            <span class="text-blue-600">Ven</span>dora
        </a>
@auth
            <div class="flex items-center gap-5">
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




