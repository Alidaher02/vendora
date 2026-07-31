async function loadCount() {
    const response = await fetch('/products/count');
    const data = await response.json();


    if(document.getElementById('productsCount')){
    document.getElementById('productsCount').textContent = data.countProducts;
    }

        if(document.getElementById('countCategories')){
    document.getElementById('countCategories').textContent = data.countCategories;
    }



}

loadCount();
setInterval(loadCount, 5000);


