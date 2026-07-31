const productSearchResults = document.getElementById("productSearchResults");
const productSearch = document.getElementById("productSearch");

if (productSearch) {

productSearch.addEventListener("input" , function(){

    let value = this.value.trim();

    if(value.length < 1)
    {
        productSearchResults.innerHTML = "";
        productSearchResults.classList.add("hidden");
        return;
    }

    fetch(`/products/search?search=${encodeURIComponent(value)}`)
        .then(res => res.json())
        .then(products => {

            productSearchResults.innerHTML = "";

        if(products.length === 0)
        {
            productSearchResults.innerHTML = `
                                <div class="px-4 py-4 text-center text-sm text-gray-400">
                        <i class="fa-solid fa-store-slash mb-2 text-gray-500"></i>
                        <p>No stores found</p>
                    </div>
            `;

            productSearchResults.classList.remove("hidden");

            return;

        } 

        products.forEach(product => {
            
            productSearchResults.innerHTML += `
            
                <a href="/stores/${product.slug}" 
                   class="block">

                    <div class="w-full px-4 py-3
                                border-b border-[#1f2530]
                                transition-all duration-200
                                hover:bg-[#182033]">

                        <div class="flex items-center justify-between">

                            <div>
                                <h3 class="text-sm font-medium text-white">
                                    ${product.name}
                                </h3>

                                <p class="text-xs text-gray-500 mt-1">
                                    Visit store
                                </p>
                            </div>


                            <img
                                src="/storage/${product.image}"
                                alt="${product.name}"
                                class="w-10 h-10 rounded-lg object-cover 
                                       border border-[#2d3748]">
                            
                        </div>

                    </div>

                </a>
            
            `;

            productSearchResults.classList.remove("hidden");


        });

        });

});


}