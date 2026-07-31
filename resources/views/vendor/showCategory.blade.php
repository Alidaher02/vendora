
<x-layout>

<div class="overflow-hidden rounded-2xl border border-[#202938] bg-[#0b101a]">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-[#111827] border-b border-[#202938]">

                <tr class="text-left">

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Product
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Category
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Price
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Stock
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Status
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400 text-right">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody id="products" class="divide-y divide-[#202938]">

                @foreach($products as $product)


                    <x-product-card :product="$product" />


                @endforeach

            </tbody>

        </table>

    </div>

</div>



</x-layout>
