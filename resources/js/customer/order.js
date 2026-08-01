const stripe = Stripe("pk_test_51TzeyHPLY2yhQe4fESTKkGFNjJ3t86rFo3Hto0om2vLKDBhw3e5uTjOESGsYCe5qjJC9Qs7LY6j7suZiCjFAHAel0012XUKGai");

const elements = stripe.elements();

const cardElement = elements.create('card');


if(document.querySelector('#card-element'))
{
    cardElement.mount('#card-element');
}



window.order = async function(event) {

    event.preventDefault();

    const btn = document.getElementById("placeOrderBtn");


    btn.disabled = true;

    btn.innerHTML = `
        <i class="fa-solid fa-spinner fa-spin"></i>
        Processing...
    `;


    const OrderForm = document.getElementById("OrderForm");

    const formData = new FormData(OrderForm);



    try {


        const response = await fetch('/checkout', {

            method: "POST",

            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .content,

                "Accept": "application/json"
            },

            body: formData

        });



        const data = await response.json();



        if(!response.ok)
        {
            throw new Error(data.error ?? "Checkout failed");
        }




        const result = await stripe.confirmCardPayment(

            data.clientSecret,

            {
                payment_method: {
                    card: cardElement
                }
            }

        );



        if(result.error)
        {
            alert(result.error.message);

            btn.disabled = false;
            btn.innerHTML = "Place Order";

            return;
        }



if(result.paymentIntent.status === "succeeded")
{

    orderMessage.innerHTML = `
     <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

    <div class="w-[90%] max-w-md rounded-3xl border border-green-500/20 bg-[#161b22] p-8 text-center shadow-2xl">

        <!-- Success Icon -->
        <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full 
                    bg-green-500/20 border border-green-500/30">

            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-500">
                <svg class="h-9 w-9 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="3">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M5 13l4 4L19 7" />

                </svg>
            </div>

        </div>


        <h2 class="mt-6 text-3xl font-bold text-white">
            Payment Successful!
        </h2>


        <p class="mt-3 leading-relaxed text-gray-400">
            Your order has been placed successfully.
            We are preparing your items now.
        </p>


        <div class="mt-6 rounded-xl border border-green-500/20 bg-green-500/10 p-4">

            <div class="flex items-center justify-center gap-2 text-green-400">

                <svg class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                </svg>


                <span class="text-sm font-medium">
                    Order is being processed
                </span>

            </div>

        </div>


        <button onclick="window.location.href='/orders'"
                class="mt-6 w-full rounded-xl py-3 font-semibold text-white
                       transition hover:scale-[1.02]"
                style="background:linear-gradient(135deg,#22c55e,#16a34a)">

            View My Orders

        </button>


    </div>

</div>
    `;

    orderMessage.classList.remove("hidden");


}


    }


    catch(error)
    {

        console.log(error);

        btn.disabled = false;
        btn.innerHTML = "Place Order";

    }


}


async function orderCount() {
    
    let response = await fetch('/orders/count');
    let data = await response.json();

    const orderCount = document.getElementById("orderCount");
    
    orderCount.textContent = data.orderCount;
}

await orderCount(); // Update the order count after placing an order
