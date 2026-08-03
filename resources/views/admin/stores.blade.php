    <x-adminLayout title="Store Requests">

    <div class="min-h-screen p-6 bg-[#0a0e16]">

        <div class="mx-auto mt-5 max-w-7xl overflow-hidden rounded-2xl border border-[#1f2530] bg-[#111827] shadow-xl">


            <!-- Header -->
            <div class="flex items-center justify-between border-b border-[#1f2530] px-6 py-5">

                <div>
                    <h1 class="text-lg font-bold text-white">
                        Store 
                    </h1>

                    <p class="text-xs text-gray-500">
                        All vendor stores in your marketplace
                    </p>
                </div>


                <div class="rounded-lg bg-blue-500/10 px-4 py-2 text-sm font-semibold text-blue-400">
                    {{ $stores->count() }} Stores
                </div>

            </div>


            <!-- Table -->
            <div class="p-6">

                <div class="overflow-hidden rounded-xl border border-[#1f2530]">

                    <table class="w-full text-left">


                        <thead class="bg-[#0a0e16]">

                            <tr>

                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    Store
                                </th>


                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    Owner
                                </th>


                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    Status
                                </th>


                                <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500 text-right">
                                    Actions
                                </th>

                            </tr>

                        </thead>



                        <tbody class="divide-y divide-[#1f2530]">


                        @forelse($stores as $store)


                            <tr class="transition hover:bg-white/5">


                                <!-- Store -->
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">


                                <div class="h-10 w-10 flex items-center justify-center rounded-lg bg-blue-500/10 text-blue-400">
                                <img
                                    src="{{ asset('storage/'.$store->image) }}"
                                    alt="{{ $store->name }}"
                                    class=" rounded-xl object-cover border border-[#2d3748]">
                                </div>


                                <div>


                                        <div>

                                            <p class="text-sm font-semibold text-white">
                                                {{ $store->name }}
                                            </p>

                                            <p class="text-xs text-gray-500">
                                                {{ $store->email }}
                                            </p>

                                        </div>

                                    </div>

                                </td>



                                <!-- Owner -->
                                <td class="px-5 py-4">

                                    <p class="text-sm text-gray-300">
                                        {{ $store->user->name ?? 'Unknown' }}
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        Vendor
                                    </p>

                                </td>




                                <!-- Status -->
                                <td class="px-5 py-4">

                                <span
                                    @class([
                                        'inline-flex rounded-full px-3 py-1 text-xs font-semibold',

                                        'bg-yellow-500/10 text-yellow-400' => $store->status === 'pending',

                                        'bg-green-500/10 text-green-400' => $store->status === 'approved',

                                        'bg-red-500/10 text-red-400' => $store->status === 'rejected',

                                        'bg-gray-500/10 text-gray-400' => !in_array($store->status, ['pending','approved','rejected']),
                                    ])>

                                    {{ $store->status  }}

                                </span>

                                </td>




                                <!-- Actions -->
                                <td class="px-5 py-4">

                                    <div class="flex justify-end gap-2">


                                        <a href="#"
                                        class="rounded-lg border border-[#2b3443] px-3 py-1.5 text-xs font-semibold text-gray-300 hover:bg-white/5 hover:text-white">

                                            View

                                        </a>

                                    </div>

                                </td>


                            </tr>



                        @empty


                            <tr>

                                <td colspan="4"
                                class="px-5 py-10 text-center text-sm text-gray-500">

                                    No pending store requests.

                                </td>

                            </tr>


                        @endforelse


                        </tbody>


                    </table>


                </div>


            </div>


        </div>


    </div>

    </x-adminLayout>