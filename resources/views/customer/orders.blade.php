<x-customerLayout title="My Orders">


<div class="min-h-screen bg-[#0a0e16] py-6 px-4">

    <div class="max-w-6xl mx-auto">

        <div>
            <a href="/stores"
            class="group flex items-center gap-2 text-sm text-gray-300 
                    hover:text-white transition">

                <i class="fa-solid fa-house text-blue-400 
                        group-hover:text-blue-300"></i>

                <span>
                    Home
                </span>

            </a>
        </div>
        <!-- Header -->
        <div class="mb-5">

            <h1 class="text-2xl font-bold text-white">
                My Orders
            </h1>

            <p class="text-sm text-gray-400 mt-1">
                Track your purchases and order status
            </p>

        </div>




        <!-- Orders Card -->
        <div class="card rounded-xl overflow-hidden shadow-lg">


            <div class="overflow-x-auto">


                <table class="w-full min-w-[800px]">


                    <thead class="bg-[#151b2b] border-b border-[#1f2530]">

                        <tr>

                            <th class="px-4 py-3 text-left text-xs text-gray-400">
                                Order ID
                            </th>


                            <th class="px-4 py-3 text-left text-xs text-gray-400">
                                Date
                            </th>


                            <th class="px-4 py-3 text-left text-xs text-gray-400">
                                Items
                            </th>


                            <th class="px-4 py-3 text-left text-xs text-gray-400">
                                Total
                            </th>


                            <th class="px-4 py-3 text-left text-xs text-gray-400">
                                Status
                            </th>


                            <th class="px-4 py-3 text-left text-xs text-gray-400">
                                Actions
                            </th>

                        </tr>

                    </thead>



                    <tbody class="divide-y divide-[#1f2530]">

                    @forelse($orders as $order)
                        <tr class="hover:bg-white/5 transition">


                            <td class="px-4 py-3 text-sm font-semibold text-white">
                                {{ $order->id }}
                            </td>


                            <td class="px-4 py-3 text-sm text-gray-400">
                                {{ $order->created_at->format('M d, Y') }}
                            </td>


                            <td class="px-4 py-3 text-sm text-gray-200">
                                @foreach($order->orderItems as $item)
                                    {{ $item->product->name }}
                                <span class="text-gray-500">
                                    {{ $item->quantity }}
                                </span>

                                @endforeach
  
                                <br>


                            </td>


                            <td class="px-4 py-3 text-sm font-bold text-blue-400">
                                ${{ $order->total_price }}
                            </td>


                            <td class="px-4 py-3">

                                <span class="
                                px-2 py-1 rounded-full text-xs
                                {{ $order->status === 'pending' ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' : 'bg-green-500/20 text-green-400' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-500/20 text-red-400 border border-red-500/30' : 'bg-green-500/20 text-green-400' }}
                                {{ $order->status === 'processing' ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : 'bg-green-500/20 text-green-400' }}
                                {{ $order->status === 'COMPLETED' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-green-500/20 text-green-400' }}
                                ">

                                    {{ $order->status }}

                                </span>

                            </td>

                            
                                                    
                            @if($order->status === 'completed' || $order->status === 'processing')
                            <td class="px-4 py-3 text-xs text-gray-400">
                                No actions
                             </td>
                            @else
                            <td class="px-4 py-3">

                                <div class="flex gap-2">
                                <form action="/orders/{{ $order->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button
                                    type="submit"
                                    class="
                                    px-3 py-1.5 rounded-lg
                                    bg-red-500/20
                                    text-red-400 cursor-pointer
                                    border border-red-500/30
                                    text-xs">

                                        Cancel

                                    </button>                              
                                </form>


                                </div>

                            </td>
                            @endif



                        </tr>

                    @empty
                    
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center text-gray-400">
                                You have no orders yet.
                            </td>
                        </tr>

                    @endforelse



                    </tbody>


                </table>


            </div>


        </div>


    </div>


</div>


</x-customerLayout>