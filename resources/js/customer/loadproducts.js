        const container = document.getElementById("productsContainer");

async function loadProducts() {
    let storeSlug = window.location.pathname.split('/')[2];

    let response = await fetch(`/stores/${storeSlug}/products`);
    let data = await response.json();

    data.products.forEach(product => {
        

        container.innerHTML +=
        `
         
        <a href="/products/${product.id}" class="block">

    <div
        class="group bg-[#10141f]
               border border-[#1f2530]
               rounded-xl
               overflow-hidden
               hover:-translate-y-1
               hover:border-blue-500/40
               hover:shadow-xl
               hover:shadow-blue-500/10
               transition-all duration-300">

        <!-- Product Image -->
        <div class="relative overflow-hidden">

            <img
               <img src="/storage/${product.image}"
                alt="{{ $product->name }}"
                class="w-full h-44 object-cover transition duration-500 group-hover:scale-105">

            <!-- Wishlist -->
            <button
                class="absolute top-3 right-3 w-8 h-8 rounded-full
                       bg-black/60 backdrop-blur
                       flex items-center justify-center
                       hover:bg-red-500 transition">

                <i class="fa-regular fa-heart text-white text-sm"></i>

            </button>

            <!-- Status -->
            <span
                class="absolute left-3 bottom-3
                       px-2.5 py-1
                       rounded-full
                       text-xs
                       bg-green-500/20
                       text-green-400">

               ${product.status}

            </span>

        </div>

        <!-- Content -->
        <div class="p-4">

            <p class="text-[11px] uppercase tracking-widest text-blue-400 font-medium">
               ${product.category.name}
            </p>

            <h3 class="mt-1 text-lg font-semibold text-white line-clamp-1 group-hover:text-blue-400 transition">
                ${product.name}
            </h3>

            <p class="mt-2 text-sm text-gray-400 line-clamp-2">
                 ${product.description}
            </p>

            <div class="flex items-center justify-between mt-4">

                <div>
                    <p class="text-xl font-bold text-white">
                        ${product.price}
                    </p>

                    <p class="text-xs text-gray-500">
                        ${product.stock} in stock
                    </p>
                </div>

                <span
                    class="px-4 py-2 rounded-lg
                           bg-blue-600
                           hover:bg-blue-700
                           text-sm font-medium
                           transition">

                    View

                </span>

            </div>

        </div>

    </div>

</a>
        `;

    });
}

if(container)
{
loadProducts();
}

 window.filterProducts =  async function(sort) {

    let storeSlug = window.location.pathname.split('/')[2];

    let response = await fetch(`/store/${storeSlug}/products?sort=${sort}`);

    let data = await response.json();

    let container = document.getElementById("productsContainer");

    container.innerHTML = "";

    data.products.forEach(product => {

container.innerHTML +=
        `
         
        <a href="/products/${product.id}" class="block">

    <div
        class="group bg-[#10141f]
               border border-[#1f2530]
               rounded-xl
               overflow-hidden
               hover:-translate-y-1
               hover:border-blue-500/40
               hover:shadow-xl
               hover:shadow-blue-500/10
               transition-all duration-300">

        <!-- Product Image -->
        <div class="relative overflow-hidden">

            <img
               <img src="/storage/${product.image}"
                class="w-full h-44 object-cover transition duration-500 group-hover:scale-105">

            <!-- Wishlist -->
            <button
                class="absolute top-3 right-3 w-8 h-8 rounded-full
                       bg-black/60 backdrop-blur
                       flex items-center justify-center
                       hover:bg-red-500 transition">

                <i class="fa-regular fa-heart text-white text-sm"></i>

            </button>

            <!-- Status -->
            <span
                class="absolute left-3 bottom-3
                       px-2.5 py-1
                       rounded-full
                       text-xs
                       bg-green-500/20
                       text-green-400">

               ${product.status}

            </span>

        </div>

        <!-- Content -->
        <div class="p-4">

            <p class="text-[11px] uppercase tracking-widest text-blue-400 font-medium">
               ${product.category.name}
            </p>

            <h3 class="mt-1 text-lg font-semibold text-white line-clamp-1 group-hover:text-blue-400 transition">
                ${product.name}
            </h3>

            <p class="mt-2 text-sm text-gray-400 line-clamp-2">
                 ${product.description}
            </p>

            <div class="flex items-center justify-between mt-4">

                <div>
                    <p class="text-xl font-bold text-white">
                        ${product.price}
                    </p>

                    <p class="text-xs text-gray-500">
                        ${product.stock} in stock
                    </p>
                </div>

                <span
                    class="px-4 py-2 rounded-lg
                           bg-blue-600
                           hover:bg-blue-700
                           text-sm font-medium
                           transition">

                    View

                </span>

            </div>

        </div>

    </div>

</a>
        `;
    });


}

window.filterByCategories = async function(categoryId) {

    let storeSlug = window.location.pathname.split('/')[2];

    let response = await fetch(
        `/store/${storeSlug}/products/categories?category=${categoryId}`
    );

    let data = await response.json();

        let container = document.getElementById("productsContainer");

    container.innerHTML = "";

    data.products.forEach(product => {

container.innerHTML +=
        `
         
        <a href="/products/${product.id}" class="block">

    <div
        class="group bg-[#10141f]
               border border-[#1f2530]
               rounded-xl
               overflow-hidden
               hover:-translate-y-1
               hover:border-blue-500/40
               hover:shadow-xl
               hover:shadow-blue-500/10
               transition-all duration-300">

        <!-- Product Image -->
        <div class="relative overflow-hidden">

            <img
               <img src="/storage/${product.image}"
                class="w-full h-44 object-cover transition duration-500 group-hover:scale-105">

            <!-- Wishlist -->
            <button
                class="absolute top-3 right-3 w-8 h-8 rounded-full
                       bg-black/60 backdrop-blur
                       flex items-center justify-center
                       hover:bg-red-500 transition">

                <i class="fa-regular fa-heart text-white text-sm"></i>

            </button>

            <!-- Status -->
            <span
                class="absolute left-3 bottom-3
                       px-2.5 py-1
                       rounded-full
                       text-xs
                       bg-green-500/20
                       text-green-400">

               ${product.status}

            </span>

        </div>

        <!-- Content -->
        <div class="p-4">

            <p class="text-[11px] uppercase tracking-widest text-blue-400 font-medium">
               ${product.category.name}
            </p>

            <h3 class="mt-1 text-lg font-semibold text-white line-clamp-1 group-hover:text-blue-400 transition">
                ${product.name}
            </h3>

            <p class="mt-2 text-sm text-gray-400 line-clamp-2">
                 ${product.description}
            </p>

            <div class="flex items-center justify-between mt-4">

                <div>
                    <p class="text-xl font-bold text-white">
                        ${product.price}
                    </p>

                    <p class="text-xs text-gray-500">
                        ${product.stock} in stock
                    </p>
                </div>

                <span
                    class="px-4 py-2 rounded-lg
                           bg-blue-600
                           hover:bg-blue-700
                           text-sm font-medium
                           transition">

                    View

                </span>

            </div>

        </div>

    </div>

</a>
        `;
    });


};