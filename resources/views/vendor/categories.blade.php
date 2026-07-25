<x-layout>
<dialog id="add_category_modal" class="modal p-0 rounded-xl backdrop:bg-black/60">
    <div class="card rounded-xl p-6 w-[32rem] max-w-[90vw]">
        <h3 class="text-white text-xl font-bold">Add Category</h3>
        <p class="text-sm text-gray-400 mt-1">List a new item in your store.</p>

                <form
                id="addCategoryForm"
                enctype="multipart/form-data"
                class="space-y-5 mt-6"  
                >
                @csrf
                    <div>
                        <label for="name" class="mb-2 text-gray-200 font-medium text-sm inline-block">Category name</label>
                        <input type="text" id="name" name="name" placeholder="e.g. Wireless Mouse" required
                            class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500" />
                    </div>
                                        <x-forms.error name="name" />
                    <div>
                        <label for="slug" class="mb-2 text-gray-200 font-medium text-sm inline-block">Slug</label>
                        <textarea id="slug" name="slug" rows="3" placeholder="Short description of the product" required
                            class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                                <x-forms.error name="slug" />
                    <div>
                        <label for="image" class="mb-2 text-gray-200 font-medium text-sm inline-block">Category image</label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="text-sm text-gray-300 rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] file:mr-3 file:py-2 file:px-3 file:border-0 file:text-sm file:font-medium file:bg-[#1a1f2b] file:text-gray-200 hover:file:bg-[#232a38]" />
                    </div>
                                            <x-forms.error name="image" />
                    <div class="flex items-center gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 py-2.5 text-sm rounded-lg font-semibold cursor-pointer text-white bg-blue-600 hover:bg-blue-700 transition-all">
                            Add Category
                        </button>
                        <button type="button" onclick="document.getElementById('add_category_modal').close()"
                            class="flex-1 py-2.5 text-sm rounded-lg font-semibold cursor-pointer text-gray-200 border border-[#2a3140] hover:bg-white/5">
                            Cancel
                        </button>
                    </div>
                </form>
    </div>
</dialog>



<button onclick="document.getElementById('add_category_modal').showModal()"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-3 py-2.5 text-sm font-semibold text-white cursor-pointer hover:bg-blue-700 transition-all mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Add New Category
</button>
<div class="overflow-hidden rounded-2xl border border-[#202938] bg-[#0b101a]">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-[#111827] border-b border-[#202938]">

                <tr class="text-left">

                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Category
                    </th>


                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-400 text-right">
                        Actions
                    </th>

                </tr>
            </thead>

            <tbody id="categories" class="divide-y divide-[#202938]">


            </tbody>
            <div id="toast"
             class="fixed bottom-5 right-5 hidden px-5 py-3 rounded-xl text-white shadow-lg">
             </div>

        </table>

    </div>

</div>




</x-layout>