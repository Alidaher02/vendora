document.getElementById('addCategoryForm').addEventListener('submit', async function(e) {

    e.preventDefault();

    const formData = new FormData(this);

    const response = await fetch('/categories/addCategory', {
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

function showMessage(message, type = "success") {

    const toast = document.getElementById("toast");

    toast.textContent = message;

    toast.classList.remove("hidden");

    if(type === "error") {
        toast.className = 
        "fixed bottom-5 right-5 px-5 py-3 rounded-xl text-white shadow-lg bg-red-500";
    } 
    else {
        toast.className = 
        "fixed bottom-5 right-5 px-5 py-3 rounded-xl text-white shadow-lg bg-green-500";
    }


    setTimeout(() => {
        toast.classList.add("hidden");
    }, 3000);
}

window.deleteCategory = async function(id) {
    const response = await fetch(`/categories/deleteCategory/${id}` , {
        method: 'DELETE',
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                                    "Accept": "application/json"
                                    
        }
    });

    const data = await response.json();

    if(response.ok) {
        showMessage(data.message, "success");
        loadCategories();
    } else {
        showMessage(data.message, "error");
        console.log(data.message);
    }
}


async function loadCategories() {
    
    const response = await fetch('/categories/loadCategories');
    const data = await response.json();


    const container = document.getElementById("categories");

    container.innerHTML = "";
    data.categories.forEach(category => {
        container.innerHTML += `
        <tr onclick="window.location.href='/categories/${category.slug}'"
    class="hover:bg-[#111827] transition cursor-pointer">

    <td class="px-6 py-4">
        <div class="flex items-center gap-4">

            <img
                src="/storage/${category.image}"
                alt="${category.name}"
                class="w-16 h-16 rounded-xl object-cover border border-[#2d3748]">

            <div>
                <h3 class="text-white font-medium">
                    ${category.name}
                </h3>


            </div>

        </div>
    </td>


    <td class="px-6 py-4">
        <div class="flex justify-end gap-2">


            <button 
                onclick="event.stopPropagation(); deleteCategory(${category.id})"
                class="delete-category w-8 h-8 flex items-center justify-center rounded-lg
                bg-red-500/10 border border-red-500/20 cursor-pointer
                text-red-400 hover:bg-red-500 hover:text-white transition">

                🗑️

            </button>

        </div>
    </td>

</tr>


        `;
    });



}

loadCategories();
setInterval(loadCategories , 1000);


