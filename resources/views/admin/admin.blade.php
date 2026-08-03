<x-adminLayout title="Dashboard">

<div class="min-h-screen bg-[#0a0e16] p-6">


    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-white">
            Vendora Dashboard
        </h1>

        <p class="mt-1 text-sm text-gray-400">
            Marketplace overview and business activity
        </p>

    </div>



    <!-- Statistics Cards -->

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">



        <!-- Users -->

        <div class="rounded-2xl border border-[#1f2530] bg-[#111827] p-6 shadow-lg shadow-black/20">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-400">
                        Total Users
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-white">
                        {{ $users }}
                    </h2>

                    <p class="mt-2 text-xs text-blue-400">
                        Registered customers
                    </p>

                </div>


                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">

                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 4a4 4 0 00-4-4h-1"/>
                    </svg>

                </div>

            </div>

        </div>





        <!-- Stores -->

        <div class="rounded-2xl border border-[#1f2530] bg-[#111827] p-6 shadow-lg shadow-black/20">

            <div class="flex items-center justify-between">


                <div>

                    <p class="text-sm text-gray-400">
                        Stores
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-white">
                        {{ $stores }}
                    </h2>

                    <p class="mt-2 text-xs text-purple-400">
                        Active vendors
                    </p>

                </div>



                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-purple-500/10 text-purple-400">


                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M5 10V6a2 2 0 012-2h10a2 2 0 012 2v4m-14 0v10a2 2 0 002 2h10a2 2 0 002-2V10"/>

                    </svg>


                </div>


            </div>

        </div>

        
        <!-- Products -->

        <div class="rounded-2xl border border-[#1f2530] bg-[#111827] p-6 shadow-lg shadow-black/20">

            <div class="flex items-center justify-between">


                <div>

                    <p class="text-sm text-gray-400">
                        Products
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-white">
                        {{ $products }}
                    </h2>


                    <p class="mt-2 text-xs text-green-400">
                        Marketplace inventory
                    </p>

                </div>



                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-500/10 text-green-400">


                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10"/>

                    </svg>


                </div>


            </div>

        </div>







        <!-- Orders -->

        <div class="rounded-2xl border border-[#1f2530] bg-[#111827] p-6 shadow-lg shadow-black/20">

            <div class="flex items-center justify-between">


                <div>

                    <p class="text-sm text-gray-400">
                        Orders
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-white">
                        {{ $orders }}
                    </h2>


                    <p class="mt-2 text-xs text-yellow-400">
                        Customer purchases
                    </p>

                </div>



                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-yellow-500/10 text-yellow-400">


                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13M9 21h.01M17 21h.01"/>

                    </svg>


                </div>


            </div>

        </div>



    </div>





    <!-- Main Content -->

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">


        <!-- Recent Orders -->

        <div class="lg:col-span-2 rounded-2xl border border-[#1f2530] bg-[#111827] shadow-lg shadow-black/20">


            <div class="border-b border-[#1f2530] px-6 py-5">


                <h2 class="font-semibold text-white">
                    Recent Orders
                </h2>


                <p class="text-xs text-gray-400">
                    Latest marketplace activity
                </p>


            </div>



            <div class="divide-y divide-[#1f2530]">


                @foreach($recentOrders as $order)

                <div class="flex items-center justify-between px-6 py-5">


                    <div>

                        <p class="font-semibold text-white">
                            Order #{{ $order->id }}
                        </p>


                        <p class="text-sm text-gray-400">
                            {{ $order->customer->name }}
                        </p>


                    </div>



                    <div class="text-right">


                        <p class="font-semibold text-white">
                            ${{ $order->total_price }}
                        </p>



                    <span class="rounded-full px-3 py-1 text-xs font-medium
                        {{ $order->status === 'pending' ? 'bg-yellow-500/10 text-yellow-400' : '' }}
                        {{ $order->status === 'cancelled' ? 'bg-red-500/10 text-red-400' : '' }}
                        {{ $order->status === 'approved' ? 'bg-blue-500/10 text-blue-400' : '' }}
                        {{ $order->status === 'completed' ? 'bg-green-500/10 text-green-400' : '' }}
                    ">
                        {{ ucfirst($order->status) }}
                    </span>


                    </div>


                </div>


                @endforeach


            </div>


        </div>
        



        <!-- Pending Actions -->

        <div class="rounded-2xl border border-[#1f2530] bg-[#111827] shadow-lg shadow-black/20">


            <div class="border-b border-[#1f2530] px-6 py-5">


                <h2 class="font-semibold text-white">
                    Pending Actions
                </h2>


                <p class="text-xs text-gray-400">
                    Requires attention
                </p>


            </div>





            <div class="space-y-5 p-6">



                <!-- Pending Stores -->

                <div class="flex items-center justify-between">


                    <div class="flex items-center gap-3">


                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-yellow-500/10 text-yellow-400">


                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3M5 11h14M5 19h14M5 7h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z"/>

                            </svg>


                        </div>



                        <span class="text-gray-400">
                            Store Requests
                        </span>


                    </div>



                    <span class="rounded-full bg-yellow-500/10 px-3 py-1 text-xs text-yellow-400">

                        {{ $pendingStores }}

                    </span>



                </div>






                <!-- Pending Orders -->


                <div class="flex items-center justify-between">


                    <div class="flex items-center gap-3">


                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">


                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0"/>

                            </svg>


                        </div>




                        <span class="text-gray-400">
                            Order Requests
                        </span>



                    </div>





                    <span class="rounded-full bg-blue-500/10 px-3 py-1 text-xs text-blue-400">

                        {{ $pendingOrders }}

                    </span>



                </div>







                <!-- System Status -->


                <div class="rounded-xl bg-[#0a0e16] p-4">


                    <div class="flex items-center gap-3">



                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-500/10 text-green-400">


                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>


                        </div>





                        <div>


                            <p class="text-sm font-semibold text-white">
                                Marketplace Status
                            </p>


                            <p class="text-xs text-green-400">
                                System running normally
                            </p>


                        </div>




                    </div>


                </div>





            </div>


        </div>



    </div>



</div>



</x-adminLayout>