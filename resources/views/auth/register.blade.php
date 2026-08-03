<x-layout title="Register">

<div class="flex h-[700px] w-full bg-[#080b12]">


    <div class="w-full flex flex-col items-center justify-center">


        <form class="md:w-96 w-80 flex flex-col items-center justify-center"
              action="/register"
              method="POST">

            @csrf


            <h2 class="text-4xl text-white font-medium">
                Create Account
            </h2>


            <div class="flex items-center gap-4 w-full my-5">

                <div class="w-full h-px bg-[#2a3140]"></div>

                <p class="w-full text-nowrap text-sm text-gray-400">
                    Join Vendora today
                </p>

                <div class="w-full h-px bg-[#2a3140]"></div>

            </div>





            <!-- Name -->

            <div class="flex items-center w-full bg-transparent border border-[#2a3140] h-12 rounded-full overflow-hidden pl-6">

                <input
                    name="name"
                    type="text"
                    placeholder="Enter your Name"
                    class="bg-transparent text-gray-300 placeholder-gray-500 outline-none text-sm w-full h-full"
                    required>

            </div>

            <x-forms.error name="name" />






            <!-- Email -->

            <div class="flex items-center mt-5 w-full bg-transparent border border-[#2a3140] h-12 rounded-full overflow-hidden pl-6">

                <input
                    name="email"
                    type="email"
                    placeholder="Enter your Email"
                    class="bg-transparent text-gray-300 placeholder-gray-500 outline-none text-sm w-full h-full"
                    required>

            </div>


            <x-forms.error name="email" />








            <!-- Password -->

            <div class="flex items-center mt-5 w-full bg-transparent border border-[#2a3140] h-12 rounded-full overflow-hidden pl-6">


                <input
                    name="password"
                    type="password"
                    placeholder="Create Your Password"
                    class="bg-transparent text-gray-300 placeholder-gray-500 outline-none text-sm w-full h-full"
                    required>


            </div>


            <x-forms.error name="password" />







            <!-- Role -->


            <div class="w-full mt-5">


                <p class="text-gray-400 text-sm mb-3">
                    Account Type
                </p>


                <div class="grid grid-cols-2 gap-3">


                    <label class="cursor-pointer">


                        <input
                            type="radio"
                            name="role"
                            value="customer"
                            checked
                            class="hidden peer">


                        <div class="
                            h-16 rounded-xl
                            border border-[#2a3140]
                            px-4
                            flex flex-col justify-center
                            transition
                            peer-checked:border-blue-500
                            peer-checked:bg-blue-500/10">


                            <span class="text-white text-sm">
                                Customer
                            </span>


                            <span class="text-gray-500 text-xs">
                                Buy products
                            </span>


                        </div>


                    </label>





                    <label class="cursor-pointer">


                        <input
                            type="radio"
                            name="role"
                            value="vendor"
                            class="hidden peer">


                        <div class="
                            h-16 rounded-xl
                            border border-[#2a3140]
                            px-4
                            flex flex-col justify-center
                            transition
                            peer-checked:border-blue-500
                            peer-checked:bg-blue-500/10">


                            <span class="text-white text-sm">
                                Vendor
                            </span>


                            <span class="text-gray-500 text-xs">
                                Sell products
                            </span>


                        </div>


                    </label>


                </div>


            </div>







            <button
                type="submit"
                class="mt-5 w-full h-11 rounded-full text-white bg-blue-600 hover:bg-blue-700 transition">

                Create Account

            </button>






            <p class="text-gray-400 text-sm mt-4">


                Already have an account?


                <a class="text-blue-400 hover:underline"
                   href="/login">

                    Sign in

                </a>


            </p>






            <div class="my-5 flex items-center gap-3 w-full">


                <div class="h-px bg-[#2a3140] flex-1"></div>


                <span class="text-gray-500 text-sm">
                    OR
                </span>


                <div class="h-px bg-[#2a3140] flex-1"></div>


            </div>







            <a href=""
               class="w-full flex items-center justify-center gap-3
                      bg-white text-gray-800
                      py-3 rounded-xl
                      font-semibold
                      hover:bg-gray-100
                      transition">



                <svg class="w-5 h-5" viewBox="0 0 24 24">

                    <path fill="#4285F4"
                    d="M21.35 12.23c0-.78-.07-1.54-.22-2.27H12v4.3h5.25a4.5 4.5 0 0 1-1.95 2.95v2.45h3.16c1.85-1.7 2.89-4.2 2.89-7.43z"/>

                    <path fill="#34A853"
                    d="M12 21.5c2.7 0 4.97-.9 6.63-2.44l-3.16-2.45c-.88.6-2 1-3.47 1-2.67 0-4.93-1.8-5.74-4.22H3v2.52A10 10 0 0 0 12 21.5z"/>

                    <path fill="#FBBC05"
                    d="M6.26 13.39a6 6 0 0 1 0-3.78V7.09H3a10 10 0 0 0 0 9.82l3.26-2.52z"/>

                    <path fill="#EA4335"
                    d="M12 6.4c1.55 0 2.94.53 4.04 1.57l3.03-3.03C16.96 3.35 14.7 2.5 12 2.5A10 10 0 0 0 3 7.09l3.26 2.52C7.07 8.2 9.33 6.4 12 6.4z"/>

                </svg>


                Continue with Google


            </a>


        </form>


    </div>


</div>


</x-layout>