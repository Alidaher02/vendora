document.getElementById('addCategoryForm').addEventListener('submit', async function(e) {

    e.preventDefault();

    const formData = new FormData(this);

    const response = await fetch('/vendor/addCategory', {
        method: 'POST',

        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },

        body: formData
    });

    const data = await response.json();

    if (response.ok) {

        console.log(data.message);

        document.getElementById('add_category_modal').close();

        this.reset();
    }

});


window.deleteCategory = async function(id) {
    const response = await fetch(`/vendor/deleteCategory/${id}` , {
        method: 'DELETE',
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                                    "Accept": "application/json"
                                    
        }
    });

    const data = await response.json();

    if(response.ok)
    {
        console.log(data.message);
        loadCategories();

    }
}

async function loadCategories() {
    
    const response = await fetch('/vendor/categories');
    const data = await response.json();


    const container = document.getElementById("categories");

    container.innerHTML = "";
    data.categories.forEach(category => {
        container.innerHTML += `
<div class="bg-[#111827] border border-[#1f2937] rounded-2xl p-4
            hover:border-blue-500/30 hover:bg-[#161f2d] transition-all duration-300">

    <div class="flex items-center gap-4">
        <img
            src="/storage/${category.image}"
            alt="${category.name}"
            class="w-16 h-16 rounded-xl object-cover border border-[#2d3748]">


        <div class="flex-1">

            <h3 class="text-white font-semibold text-base">
               ${category.name}
            </h3>

            <p class="text-sm text-gray-400 mt-1">
                Product Category
            </p>

        </div>


        <button
            onclick="deleteCategory(${category.id})"
            class="delete-category cursor-pointer w-9 h-9 flex items-center justify-center rounded-lg
            bg-red-500/10 border border-red-500/20
            text-red-400 hover:bg-red-500 hover:text-white transition"
            data-id="${category.id}">

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

</div>
        `;
    });


}

loadCategories();
setInterval(loadCategories , 1000);
