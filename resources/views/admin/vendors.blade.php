<x-adminLayout title="Vendors">

<div class="min-h-screen bg-[#0a0e16] p-6">


    <!-- Header -->

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-white">
            Vendors
        </h1>

        <p class="mt-1 text-sm text-gray-400">
            Manage Vendora marketplace sellers
        </p>

    </div>




    <!-- Vendors Table -->


    <div class="overflow-hidden rounded-2xl border border-[#1f2530] bg-[#111827] shadow-lg shadow-black/20">


        <div class="border-b border-[#1f2530] px-6 py-5">

            <h2 class="font-semibold text-white">
                Vendor List
            </h2>

            <p class="text-sm text-gray-400">
                All registered vendors
            </p>

        </div>




        <div class="overflow-x-auto">


            <table class="w-full text-left">


                <thead class="bg-[#0a0e16]">

                    <tr class="text-xs uppercase tracking-wider text-gray-400">

                        <th class="px-6 py-4">
                            Vendor
                        </th>


                        <th class="px-6 py-4">
                            Store
                        </th>


                        <th class="px-6 py-4">
                            Products
                        </th>


                        <th class="px-6 py-4 text-right">
                            Action
                        </th>


                    </tr>


                </thead>





                <tbody class="divide-y divide-[#1f2530]">


                @foreach($vendors as $vendor)


                    <tr class="transition hover:bg-[#0a0e16]">


                        <!-- Vendor -->


                        <td class="px-6 py-5">


                            <div class="flex items-center gap-3">


                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">


                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>

                                    </svg>


                                </div>



                                <div>

                                    <p class="font-semibold text-white">
                                        {{ $vendor->name }}
                                    </p>


                                    <p class="text-sm text-gray-400">
                                        {{ $vendor->email }}
                                    </p>


                                </div>


                            </div>


                        </td>





                        <!-- Store -->


                        <td class="px-6 py-5 text-white">

                            {{ $vendor->store->name ?? 'No Store' }}

                        </td>






                        <!-- Products -->


                        <td class="px-6 py-5 text-gray-300">

                            {{ $vendor->store?->products()->count() ?? 0 }}

                        </td>







                        <!-- Action -->


                        <td class="px-6 py-5 text-right">


                            <a href="#"
                            class="rounded-lg bg-blue-500/10 px-4 py-2 text-sm text-blue-400 transition hover:bg-blue-500/20">

                                View

                            </a>


                        </td>


                    </tr>



                @endforeach



                </tbody>


            </table>


        </div>


    </div>



</div>


</x-adminLayout>