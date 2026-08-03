    <x-adminLayout title="Settings">

    <div class="min-h-screen bg-[#0a0e16] p-6">


        <!-- Header -->

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-white">
                Settings
            </h1>

            <p class="mt-1 text-sm text-gray-400">
                Manage Vendora platform settings
            </p>

        </div>





        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">



            <!-- Profile -->
                <form  class="lg:col-span-2 rounded-2xl border border-[#1f2530] bg-[#111827] p-6 shadow-lg shadow-black/20" action="/profile/update" method="post">
                @csrf
                @method('PATCH')
                
            <div >


                <h2 class="text-lg font-semibold text-white">
                    Admin Profile
                </h2>


                <p class="mt-1 text-sm text-gray-400">
                    Update your account information
                </p>




                <div class="mt-6 grid gap-5 md:grid-cols-2">


                    <div>

                        <label class="text-sm text-gray-400">
                            Name
                        </label>


                        <input 
                        type="text"
                        value="{{ auth()->user()->name }}"
                        name="name"
                        class="mt-2 w-full rounded-xl border border-[#1f2530] bg-[#0a0e16] px-4 py-3 text-white outline-none focus:border-blue-500">

                    </div>





                    <div>

                        <label class="text-sm text-gray-400">
                            Email
                        </label>


                        <input 
                        type="email"
                        value="{{ auth()->user()->email }}"
                        name="email"
                        class="mt-2 w-full rounded-xl border border-[#1f2530] bg-[#0a0e16] px-4 py-3 text-white outline-none focus:border-blue-500">

                    </div>



                </div>




                <button class="mt-6 rounded-xl bg-blue-500 px-5 py-3 text-sm font-medium text-white hover:bg-blue-600">

                    Save Changes

                </button>


            </div>
                
                
                </form>








            <!-- Account -->

            <div class="rounded-2xl border border-[#1f2530] bg-[#111827] p-6 shadow-lg shadow-black/20">


                <h2 class="text-lg font-semibold text-white">
                    Account
                </h2>


                <div class="mt-6 space-y-4">



                    <button class="flex w-full items-center justify-between rounded-xl bg-[#0a0e16] p-4 text-left hover:bg-[#151b28]">


                        <span class="text-gray-300">
                            Change Password
                        </span>


                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"/>

                        </svg>


                    </button>





                    <button class="flex w-full items-center justify-between rounded-xl bg-[#0a0e16] p-4 text-left hover:bg-[#151b28]">


                        <span class="text-gray-300">
                            Notifications
                        </span>


                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"/>

                        </svg>


                    </button>


                </div>


            </div>







            <!-- Marketplace Settings -->


            <div class="lg:col-span-3 rounded-2xl border border-[#1f2530] bg-[#111827] p-6 shadow-lg shadow-black/20">


                <h2 class="text-lg font-semibold text-white">
                    Marketplace Settings
                </h2>


                <p class="mt-1 text-sm text-gray-400">
                    Control Vendora platform behavior
                </p>




                <div class="mt-6 grid gap-5 md:grid-cols-3">



                    <div class="rounded-xl bg-[#0a0e16] p-5">


                        <p class="text-sm text-gray-400">
                            Vendor Registration
                        </p>


                        <div class="mt-3 flex items-center justify-between">


                            <span class="text-white">
                                Enabled
                            </span>


                            <div class="h-6 w-11 rounded-full bg-blue-500 p-1">

                                <div class="h-4 w-4 rounded-full bg-white"></div>

                            </div>


                        </div>


                    </div>







                    <div class="rounded-xl bg-[#0a0e16] p-5">


                        <p class="text-sm text-gray-400">
                            Product Approval
                        </p>


                        <div class="mt-3 flex items-center justify-between">


                            <span class="text-white">
                                Manual
                            </span>


                            <span class="rounded-full bg-yellow-500/10 px-3 py-1 text-xs text-yellow-400">
                                Review
                            </span>


                        </div>


                    </div>







                    <div class="rounded-xl bg-[#0a0e16] p-5">


                        <p class="text-sm text-gray-400">
                            Platform Status
                        </p>


                        <div class="mt-3 flex items-center gap-2">


                            <span class="h-2 w-2 rounded-full bg-green-400"></span>


                            <span class="text-green-400">
                                Online
                            </span>


                        </div>


                    </div>




                </div>


            </div>




        </div>


    </div>

    @if(session('success'))
        <div id="successMessage"
            class="fixed bottom-5 right-5 flex items-center gap-3
                bg-[#1f2937] border border-green-500/40
                text-white px-6 py-4 rounded-2xl
                shadow-2xl shadow-black/60
                text-sm font-medium z-50
                transition-all duration-500">

            <div class="flex items-center justify-center w-9 h-9 rounded-full 
                        bg-green-500">
                <i class="fa-solid fa-check text-white"></i>
            </div>

            <div>
                <p class="font-semibold text-white">Success</p>
                <p class="text-gray-300 text-xs">{{ session('success') }}</p>
            </div>
        </div>

        <script>
            setTimeout(() => {
                const msg = document.getElementById('successMessage');
                msg.classList.add('opacity-0', 'translate-y-5');

                setTimeout(() => {
                    msg.remove();
                }, 500);
            }, 2000);
        </script>
    @endif
    </x-adminLayout>