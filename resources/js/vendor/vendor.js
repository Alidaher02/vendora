const form = document.getElementById('addProductForm');
if (form) {
form.addEventListener('submit', function(e){

    e.preventDefault();


    let formData = new FormData(this);


    fetch('/products/addProduct', {

        method: 'POST',

        headers: {

            'X-CSRF-TOKEN':
            document.querySelector('input[name="_token"]').value

        },

        body: formData

    })


    .then(response => response.json())


    .then(data => {

        document
        .getElementById('products')
        .insertAdjacentHTML('afterbegin', data.html);


        form.reset();


    document.getElementById('add_product_modal').close();

    }); 


});
}

document.querySelectorAll('.delete-product').forEach(button => {

    button.addEventListener('click', function(){

        let productId = this.dataset.id;

        fetch(`/products/deleteProduct/${productId}`, {

            method: 'DELETE',

            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }

        })
        .then(response => response.json())
        .then(data => {

            if(data.success){

                // remove product card/row without refresh
                this.closest('tr').remove();

            }

        })
        .catch(error => console.log(error));

    });

}); 


