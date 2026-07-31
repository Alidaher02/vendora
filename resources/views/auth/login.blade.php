<x-layout>

<main class="min-h-screen relative overflow-hidden bg-[#070b14] flex items-center justify-center px-4">


    <!-- Background effects -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full"></div>

    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-purple-600/20 blur-[120px] rounded-full"></div>



    <div class="relative w-full max-w-md">


        <!-- Brand -->
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-11 h-11 rounded-xl bg-blue-600 
                            flex items-center justify-center
                            shadow-lg shadow-blue-600/30">

                    <span class="text-white text-xl font-bold">
                        V
                    </span>

                </div>


                <span class="text-xl font-semibold text-white tracking-wide">
                    Vendora
                </span>

            </div>


            <h1 class="text-4xl font-bold text-white leading-tight">
                Welcome back.
                <span class="text-blue-500">
                    Login
                </span>
            </h1>


            <p class="mt-3 text-neutral-400">
                Manage your store, products and orders from one place.
            </p>

        </div>





        <!-- Login box -->
        <div class="bg-[#0d1422]/80 backdrop-blur-xl 
                    border border-white/10 
                    rounded-3xl p-8
                    shadow-2xl">


            <form method="POST" action="/login" class="space-y-5">

                @csrf



                <!-- Email -->
                <div>

                    <label class="text-sm text-neutral-300">
                        Email
                    </label>


                    <input
                    type="email"
                    name="email"
                    placeholder="you@example.com"
                    required
                    class="mt-2 w-full rounded-xl
                           bg-[#080d17]
                           border border-white/10
                           px-4 py-3
                           text-white
                           placeholder:text-neutral-600
                           outline-none
                           focus:border-blue-500
                           focus:ring-4 focus:ring-blue-500/10
                           transition">


                </div>





                <!-- Password -->
                <div>

                    <div class="flex justify-between">

                        <label class="text-sm text-neutral-300">
                            Password
                        </label>


                        <a href="#"
                        class="text-xs text-blue-400 hover:text-blue-300">
                            Forgot?
                        </a>

                    </div>


                    <input
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    class="mt-2 w-full rounded-xl
                           bg-[#080d17]
                           border border-white/10
                           px-4 py-3
                           text-white
                           placeholder:text-neutral-600
                           outline-none
                           focus:border-blue-500
                           focus:ring-4 focus:ring-blue-500/10
                           transition">

                </div>





                <button
                class="group relative w-full overflow-hidden rounded-xl 
                       bg-blue-600 py-3.5
                       text-white font-semibold
                       transition">


                    <span class="relative z-10">
                        Sign In
                    </span>


                    <div class="absolute inset-0 
                                translate-y-full
                                bg-blue-500
                                group-hover:translate-y-0
                                transition duration-300">
                    </div>


                </button>



            </form>




            <div class="mt-8 flex items-center gap-3">

                <div class="h-px flex-1 bg-white/10"></div>

                <span class="text-xs text-neutral-500">
                    OR
                </span>

                <div class="h-px flex-1 bg-white/10"></div>

            </div>




            <p class="mt-6 text-center text-sm text-neutral-400">

                New here?

                <a href="/register"
                class="text-white font-medium hover:text-blue-400 transition">
                    Create your account
                </a>

            </p>


        </div>


    </div>


</main>


</x-layout>