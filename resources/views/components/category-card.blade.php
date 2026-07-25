<div class="bg-[#111827] border border-[#1f2937] rounded-2xl p-4
            hover:border-blue-500/30 hover:bg-[#161f2d] transition-all duration-300">

    <div class="flex items-center gap-4">
            @if($category->image)
        <img
            src="{{ asset('storage/'.$category->image) }}"
            alt="{{ $category->name }}"
            class="w-16 h-16 rounded-xl object-cover border border-[#2d3748]">
            @endif


        <div class="flex-1">

            <h3 class="text-white font-semibold text-base">
                {{ $category->name }}
            </h3>

            <p class="text-sm text-gray-400 mt-1">
                Product Category
            </p>

        </div>

<form action="/vendor/deleteCategory/{{$category->id}}" method="POST">
@csrf
@method('DELETE')
        <button
            class="delete-category cursor-pointer w-9 h-9 flex items-center justify-center rounded-lg
            bg-red-500/10 border border-red-500/20
            text-red-400 hover:bg-red-500 hover:text-white transition"
            data-id="{{ $category->id }}">

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
</form>


    </div>

</div>