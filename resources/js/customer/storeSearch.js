const storeSearch = document.getElementById("storeSearch");
const searchResults = document.getElementById("searchResults");

storeSearch.addEventListener("input" , function(){

    let value = this.value;

    if(value.length < 1)
    {
        searchResults.innerHTML = "";
        return;
    }

    fetch(`/stores/search?search=${value}`)
        .then(res => res.json())
        .then(stores => {

        searchResults.innerHTML = "";

        stores.foreach(store => {

            searchResults.innerHTML += `
            
            <div class="p-3 border rounded hover:bg-gray-100>
            ${store.name};
            </div>
            
            `


        });


        });



})