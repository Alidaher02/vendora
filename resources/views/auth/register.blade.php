<x-layout>

<main class="min-h-screen relative overflow-hidden bg-[#070b14] flex items-center justify-center px-4 py-10">


    <!-- Background glow -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full"></div>

    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-purple-600/20 blur-[120px] rounded-full"></div>



    <div class="relative w-full max-w-lg">


        <!-- Brand -->
        <div class="mb-8">

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


            <h1 class="text-4xl font-bold text-white">
                Create your account.
            </h1>


            <p class="mt-3 text-neutral-400">
                Join Vendora and start managing your marketplace.
            </p>

        </div>





        <!-- Register Card -->
        <div class="bg-[#0d1422]/80 backdrop-blur-xl
                    border border-white/10
                    rounded-3xl p-8
                    shadow-2xl">


            <form method="POST" action="/register" class="space-y-5">

                @csrf



                <!-- Name -->
                <div>

                    <label class="text-sm text-neutral-300">
                        Full Name
                    </label>


                    <input
                    type="text"
                    name="name"
                    placeholder="John Doe"
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





                <!-- Email -->
                <div>

                    <label class="text-sm text-neutral-300">
                        Email Address
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

                    <label class="text-sm text-neutral-300">
                        Password
                    </label>


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





                <!-- Role Selection -->
                <div>

                    <label class="text-sm text-neutral-300">
                        Account Type
                    </label>


                    <div class="grid grid-cols-2 gap-4 mt-3">


                        <!-- Customer -->

                        <label class="cursor-pointer">

                            <input
                            type="radio"
                            name="role"
                            value="customer"
                            checked
                            class="peer hidden">


                            <div
                            class="rounded-2xl border border-white/10
                                   bg-[#080d17]
                                   p-4
                                   transition
                                   peer-checked:border-blue-500
                                   peer-checked:bg-blue-500/10
                                   peer-checked:ring-2
                                   peer-checked:ring-blue-500/20
                                   hover:border-blue-400">


                                <h3 class="text-white font-semibold">
                                    Customer
                                </h3>


                                <p class="mt-2 text-xs text-neutral-500">
                                    Shop products and place orders.
                                </p>


                            </div>


                        </label>





                        <!-- Vendor -->

                        <label class="cursor-pointer">

                            <input
                            type="radio"
                            name="role"
                            value="vendor"
                            class="peer hidden">


                            <div
                            class="rounded-2xl border border-white/10
                                   bg-[#080d17]
                                   p-4
                                   transition
                                   peer-checked:border-blue-500
                                   peer-checked:bg-blue-500/10
                                   peer-checked:ring-2
                                   peer-checked:ring-blue-500/20
                                   hover:border-blue-400">


                                <h3 class="text-white font-semibold">
                                    Vendor
                                </h3>


                                <p class="mt-2 text-xs text-neutral-500">
                                    Create stores and sell products.
                                </p>


                            </div>


                        </label>


                    </div>

                </div>






                <!-- Button -->
                <button
                type="submit"
                class="group relative w-full overflow-hidden rounded-xl 
                       bg-blue-600 py-3.5
                       text-white font-semibold
                       transition">


                    <span class="relative z-10">
                        Create Account
                    </span>


                    <div class="absolute inset-0 
                                translate-y-full
                                bg-blue-500
                                group-hover:translate-y-0
                                transition duration-300">
                    </div>


                </button>



            </form>





            <p class="mt-8 text-center text-sm text-neutral-400">

                Already have an account?

                <a href="/login"
                class="text-white font-medium hover:text-blue-400 transition">
                    Sign in
                </a>

            </p>


        </div>


    </div>


</main>


</x-layout>