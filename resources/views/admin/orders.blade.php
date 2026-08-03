<x-adminLayout title="Orders">

<div class="min-h-screen p-6 bg-[#0a0e16]">

    <div class="mx-auto mt-5 max-w-7xl overflow-hidden rounded-2xl border border-[#1f2530] bg-[#111827] shadow-xl">


        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#1f2530] px-6 py-5">

            <div>
                <h1 class="text-lg font-bold text-white">
                    Orders
                </h1>

                <p class="text-xs text-gray-500">
                    Manage all customer orders
                </p>
            </div>


            <div class="rounded-lg bg-blue-500/10 px-4 py-2 text-sm font-semibold text-blue-400">
                {{ $orders->count() }} Orders
            </div>

        </div>


        <!-- Table -->
        <div class="p-6">

            <div class="overflow-hidden rounded-xl border border-[#1f2530]">

                <table class="w-full text-left">

                    <thead class="bg-[#0a0e16]">

                        <tr>

                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Order
                            </th>


                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Customer
                            </th>


                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Country
                            </th>


                            <th class="px-5 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Total
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


                    @forelse($orders as $order)

                    <tr class="transition hover:bg-white/5">


                        <!-- Order -->
                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">

                                <div>

                                    <p class="text-sm font-semibold text-white">
                                        #{{ $order->id }}
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        {{ $order->created_at->format('M d, Y') }}
                                    </p>

                                </div>

                            </div>

                        </td>



                        <!-- Customer -->
                        <td class="px-5 py-4">

                            <p class="text-sm text-gray-300">
                                {{ $order->customer->name ?? 'Unknown' }}
                            </p>

                            <p class="text-xs text-gray-500">
                                Customer
                            </p>

                        </td>



                        <!-- Store -->
                        <td class="px-5 py-4">

                            <p class="text-sm text-gray-300">
                                {{ $order->country ?? '--' }}
                            </p>

                        </td>



                        <!-- Total -->
                        <td class="px-5 py-4">

                            <p class="text-sm font-semibold text-white">
                                ${{ number_format($order->total_price,2) }}
                            </p>

                        </td>



                        <!-- Status -->
                        <td class="px-5 py-4">

                            @if($order->status == 'pending')

                                <span class="rounded-full bg-yellow-500/10 px-3 py-1 text-xs font-semibold text-yellow-400">
                                    Pending
                                </span>

                            @elseif($order->status == 'completed')

                                <span class="rounded-full bg-green-500/10 px-3 py-1 text-xs font-semibold text-green-400">
                                    Completed
                                </span>

                            @elseif($order->status == 'cancelled')

                                <span class="rounded-full bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-400">
                                    Cancelled
                                </span>

                            @else

                                <span class="rounded-full bg-blue-500/10 px-3 py-1 text-xs font-semibold text-blue-400">
                                    {{ ucfirst($order->status) }}
                                </span>

                            @endif

                        </td>



                        <!-- Actions -->
                        <td class="px-5 py-4">

                            <div class="flex justify-end">

                                <a href="#"
                                class="rounded-lg border border-[#2b3443] px-3 py-1.5 text-xs font-semibold text-gray-300 hover:bg-white/5 hover:text-white">

                                    View

                                </a>

                            </div>

                        </td>


                    </tr>


                    @empty

                    <tr>

                        <td colspan="6"
                        class="px-5 py-10 text-center text-sm text-gray-500">

                            No orders found.

                        </td>

                    </tr>

                    @endforelse


                    </tbody>

                </table>

            </div>


            <div class="mt-6">
                {{ $orders->links() }}
            </div>


        </div>


    </div>

</div>

</x-adminLayout>