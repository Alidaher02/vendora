<meta name="csrf-token" content="{{ csrf_token() }}">
<div>
                <tr class="hover:bg-[#111827] transition">

                    <td class="px-6 py-4">

                        <div class="flex items-center gap-4">

                    <img src="{{ asset('storage/'.$product->image) }}"
                        class="w-14 h-14 flex-shrink-0 rounded-xl object-cover border border-[#202938]">

                            <div>

                                <h3 class="text-white font-medium">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-xs text-gray-500 line-clamp-1">
                                    {{ $product->description }}
                                </p>

                            </div>

                        </div>

                    </td>

                    <td class="px-6 py-4 text-gray-300">
                        {{ $product->category->name }}
                    </td>

                    <td class="px-6 py-4 font-semibold text-blue-400">
                        ${{ number_format($product->price,2) }}
                    </td>

                    <td class="px-6 py-4 text-gray-300">
                        {{ $product->stock }}
                    </td>

                    <td class="px-6 py-4">

                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            bg-green-500/10 text-green-400 border border-green-500/20">

                            {{ ucfirst($product->status) }}

                        </span>

                    </td>

                    <td class="px-6 py-4">

<div class="flex justify-end gap-2">


                            <button href="" id="editButton" onclick="openModal({{ $product->id }})"
                               class="w-8 h-8  rounded-lg flex items-center justify-center
                               bg-blue-500/10 border border-blue-500/20
                               text-blue-400 hover:bg-blue-500 hover:text-white transition">

                                ✏️

                            </button>

                        <button 
                            class="delete-product w-8 h-8 flex items-center justify-center rounded-lg
                            bg-red-500/10 border border-red-500/20 cursor-pointer
                            text-red-400 hover:bg-red-500 hover:text-white transition"
                            data-id="{{ $product->id }}">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>

                        </button>

                        </div>

                    </td>

                </tr> 
</div>

