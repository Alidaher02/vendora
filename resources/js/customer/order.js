window.order = async function() {
    const response = await fetch('/checkout' , {
        method: "POST",

        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .content,
            "Accept": "application/json"
        }
    });

    const data = await response.json();

    const orderMessage = document.getElementById("orderMessage");

    if(response.ok)
    {
orderMessage.innerHTML = `
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

    <div class="w-[90%] max-w-md rounded-2xl border border-white/10 bg-[#161b22] p-8 shadow-2xl">

        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-500/20 border border-green-500/30">
            <i class="fa-solid fa-check text-4xl text-green-400"></i>
        </div>

        <h2 class="mt-6 text-center text-3xl font-bold text-white">
           ${data.message}
        </h2>

        <p class="mt-3 text-center text-gray-400 leading-relaxed">
            Thank you for your purchase. Your order has been placed successfully and is now being processed.
        </p>

        <div class="mt-8 space-y-3 grid grid-cols-1">

            <button onclick="window.location.href='/orders'"
                class="w-full rounded-xl py-3 font-semibold text-white transition hover:opacity-90"
                style="background: linear-gradient(135deg, #4f7cff, #8b5cf6);">
                View My Orders
            </button>

            <a href="/stores"
                class="w-full text-center rounded-xl border border-white/10 py-3 font-semibold text-gray-300 transition hover:bg-white/5">
                Continue Shopping
            </a>

        </div>

    </div>
</div>
`;
        orderMessage.classList.remove("hidden");
    }



}

