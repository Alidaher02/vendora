      const itemsContainer = document.getElementById("itemsContainer");

async function loadItems() {


 


    let response = await fetch('/cart/items');
    let data = await response.json();

    const container = document.getElementById("cartContainer");

    container.innerHTML = "";

    data.items.forEach(item => {

        container.innerHTML += `
            <li class="flex gap-4 bg-[#10141f] border border-[#1f2530] px-4 py-5 rounded-lg"> <div class="flex gap-5 sm:gap-4 max-sm:flex-col flex-1"> <div class="w-20 h-20 shrink-0 rounded-md overflow-hidden bg-[#161b27] border border-[#1f2530]"> <img src="/storage/${item.product.image}" class="w-full h-full object-cover" alt="Amber Fig Candle"> </div> <div class="flex flex-col gap-3 flex-1"> <div> <h3 class="text-[15px] font-semibold text-white">${item.product.name}</h3> <p class="text-xs text-gray-500 mt-1">Sold by <span class="text-gray-400 font-medium">${item.product.name}</p> </div> <div class="mt-auto"> <p class="text-sm font-semibold text-white">${item.product.price}</p> </div> </div> </div> <div class="ml-auto flex flex-col items-end gap-3"> <div class="flex items-center gap-3"> <button aria-label="Add to wishlist" class="text-gray-500 hover:text-pink-500 transition"> <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 64 64"> <path d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"/> </svg> </button> <button type="button" onclick="deleteItem(${item.id})" aria-label="Remove item" class=" cursor-pointer text-gray-500 hover:text-red-400 transition"> <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24"> <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"/> <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"/> </svg> </button> </div> <div class="flex items-center mt-auto field text-gray-200 font-medium text-xs rounded-md px-2 py-1.5"> <button onclick="decrementItem(${item.id})" aria-label="Decrease quantity" class=" cursor-pointer text-gray-400 hover:text-white px-1">−</button> 
            
            <span id="quantityCount-${item.id}" id="quantityCount" class="mx-3 font-mono"></span> 
            
            <button onclick="incrementItem(${item.id})" aria-label="Increase quantity" class="text-gray-400 cursor-pointer hover:text-white px-1">+</button> </div> </div> </li>
        `;
            loadCountQuantity(item.id);


    });
}

        loadItems();


    const container = document.getElementById("checkoutContainer");

async function loadItemscheckout() {

  container.innerHTML = `
        ${Array(3).fill(`
        <li class="animate-pulse flex items-center gap-3 bg-[#10141f] border border-[#1f2530] px-3 py-3 rounded-lg">

            <div class="w-12 h-12 rounded-md bg-gray-700"></div>

            <div class="flex-1 space-y-2">
                <div class="h-3 bg-gray-700 rounded w-1/2"></div>
                <div class="h-2 bg-gray-700 rounded w-1/3"></div>
                <div class="h-2 bg-gray-700 rounded w-1/4"></div>
            </div>

            <div class="h-4 bg-gray-700 rounded w-12"></div>

        </li>
        `).join("")}
    `;
    try {

        let response = await fetch('/cart/items');
        let data = await response.json();

            await new Promise(resolve => setTimeout(resolve, 1000));



        container.innerHTML = "";

        data.items.forEach(item => {

            container.innerHTML += `
            <li class="flex items-center gap-3 bg-[#10141f] border border-[#1f2530] px-3 py-3 rounded-lg">

                <img 
                    src="/storage/${item.product.image}" 
                    class="w-12 h-12 rounded-md object-cover"
                >

                <div class="flex-1">
                    <h3 class="text-white text-sm">
                        ${item.product.name}
                    </h3>

                    <p class="text-gray-400 text-xs">
                        Qty: ${item.quantity}
                    </p>
                </div>

                <p class="text-white">
                    $${item.product.price}
                </p>

            </li>
            `;

        });

    } catch(error) {
        console.log(error);
    }
}
     loadItemscheckout();

    
window.addItemToaCart =  async function(productId) {
    
    const response = await fetch(`/store/cart/${productId}` , {
        method: "POST",

        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .content,
            "Accept": "application/json"
        }
    });

    const data = await response.json();


    const messageBox = document.getElementById("messageBox");

        if(response.ok)
        {
            showMessage(data.message);
        }
        else  showMessage(data.error , "error");
    

    
    cartCount();    
    loadItems();
    loadTotalPrice();
    
}

function showMessage(message , type = "message")
{
        const messageBox = document.getElementById("messageBox");

        messageBox.textContent = message;

        messageBox.classList.remove("hidden");

        if(type === "error")
        {
        messageBox.style.backgroundColor = "red";
        }

        
    setTimeout(() => {
        messageBox.classList.add("hidden");
    }, 3000);

}

async function cartCount() {
    
    let response = await fetch('/cart/count');
    let data = await response.json();
    
    
   document.querySelectorAll(".cartCount").forEach(element => {
    element.innerText = data.count;
});
}

cartCount();

async function loadTotalPrice(){

    const totals = document.querySelectorAll(".total");

    // Loading animation
    totals.forEach(element => {
        element.classList.add(
            "animate-pulse",
            "bg-gray-700",
            "rounded",
            "text-transparent"
        );

        element.innerText = "$0.00";
    });


    let response = await fetch('/store/cart/total');
    let data = await response.json();

    await new Promise(resolve => setTimeout(resolve, 1000));



    // Show total
    totals.forEach(element => {

        element.classList.remove(
            "animate-pulse",
            "bg-gray-700",
            "rounded",
            "text-transparent"
        );

        element.innerText = `$${data.total ?? 0.00}`;
    });

}

loadTotalPrice();

async function loadCountQuantity(itemId){

   let response = await fetch(`/store/cart/quantity/${itemId}`);
   let data = await response.json();

    document.getElementById(`quantityCount-${itemId}`).textContent = data.count;
}   


window.incrementItem = async function (itemId) {
    
    const response = await fetch(`/cart/items/${itemId}/inc` , {
        method: "PATCH",

        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .content,
            "Accept": "application/json"
        }
    });

     const data = await response.json();



    if(response.ok)
    {
     loadCountQuantity(itemId);
    }
    else{
        const noStock = document.getElementById("noStock");

        noStock.textContent = data.error;
        noStock.classList.remove("hidden");

        setTimeout(() => {
           noStock.classList.add("hidden");
        }, 3000);

    }

    loadTotalPrice();

}

window.decrementItem = async function (itemId) {
    
    const response = await fetch(`/cart/items/${itemId}/dec` , {
        method: "PATCH",

        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .content,
            "Accept": "application/json"
        }
    });

    const data = await response.json();

    if(response.ok)
    {
    loadCountQuantity(itemId);
    }
    



    loadTotalPrice();

}

window.deleteItem =  async function (itemId) {
   
   const response = await  fetch(`/cart/items/${itemId}`, {
      method: "DELETE",

      headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .content,
            "Accept": "application/json"
        }
   });

   const data = await response.json();
   const cartEmpty = document.getElementById("cartEmpty")

   console.log(data.message);

   const deleteMessage = document.getElementById("deleteMessage");
   deleteMessage.innerText = data.message;
   deleteMessage.classList.remove("hidden");

           cartEmpty.innerHTML = `
        <i class="fa-solid fa-cart-shopping text-6xl text-gray-500"></i>

        <h2 class="mt-4 text-xl font-bold text-white">
            Your cart is empty
        </h2>

        <p class="mt-2 text-gray-400">
            Add products from your favorite stores.
        </p>

        <a href="/stores"
           class="inline-block mt-6 px-6 py-3 bg-indigo-600 rounded-lg text-white">
            Continue Shopping
        </a>
        `;

   setTimeout(() => {
       deleteMessage.classList.add("hidden");

   }, 3000);



    await loadItems();
    cartCount()
    loadTotalPrice();


}