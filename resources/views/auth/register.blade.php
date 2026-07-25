<x-layout>


   <div class="min-h-screen flex flex-col items-center mt-10">
      <div class="max-w-md w-full">
         <div
            class="p-6 rounded-lg bg-white border border-slate-300 shadow-xs md:p-8 dark:bg-neutral-800 dark:border-neutral-700">
            <h1 class="text-slate-900 text-center text-3xl font-bold dark:text-slate-50">Sign Up</h1>

            <form class="space-y-6 mt-10" method="POST" action="/register">
            @csrf
                <div>
                  <label for="name"
                     class="mb-2 text-slate-900 font-medium text-sm inline-block dark:text-slate-50">Email</label>
                  <input type="text" id="name" name="name" placeholder="Enter your Name" required
                     class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 dark:text-slate-50 dark:bg-neutral-700 dark:outline-neutral-600" />
               </div>
               <div>
                  <label for="email"
                     class="mb-2 text-slate-900 font-medium text-sm inline-block dark:text-slate-50">Email</label>
                  <input type="email" id="email" name="email" placeholder="john@readymadeui.com" required
                     class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 dark:text-slate-50 dark:bg-neutral-700 dark:outline-neutral-600" />
               </div>
               <div>
                  <label for="password"
                     class="mb-2 text-slate-900 font-medium text-sm inline-block dark:text-slate-50">Password</label>
                  <input type="password" id="password" name="password" placeholder="••••••••" required
                     class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 dark:text-slate-50 dark:bg-neutral-700 dark:outline-neutral-600" />
               </div>

               <div>

    <div class="grid grid-cols-2 gap-4">

        <!-- Customer -->
        <label class="group cursor-pointer">
            <input
                type="radio"
                name="role"
                value="customer"
                class="peer hidden"
                checked>

            <div
                class="rounded-xl border border-slate-300 bg-white p-4 transition-all
                peer-checked:border-blue-600
                peer-checked:bg-blue-50
                peer-checked:ring-2 peer-checked:ring-blue-500/30
                hover:border-blue-400
                dark:border-neutral-700
                dark:bg-neutral-800
                dark:hover:border-blue-500
                dark:peer-checked:bg-blue-950/40">

                <div class="flex items-center justify-between">
                    <h3 class="font-semibold text-slate-900 dark:text-white">
                        Customer
                    </h3>

                </div>

                <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                    Buy products and place orders.
                </p>
            </div>
        </label>

        <!-- Vendor -->
        <label class="group cursor-pointer">
            <input
                type="radio"
                name="role"
                value="vendor"
                class="peer hidden">

            <div
                class="rounded-xl border border-slate-300 bg-white p-4 transition-all
                peer-checked:border-blue-600
                peer-checked:bg-blue-50
                peer-checked:ring-2 peer-checked:ring-blue-500/30
                hover:border-blue-400
                dark:border-neutral-700
                dark:bg-neutral-800
                dark:hover:border-blue-500
                dark:peer-checked:bg-blue-950/40">

                <div class="flex items-center justify-between">
                    <h3 class="font-semibold text-slate-900 dark:text-white">
                        Vendor
                    </h3>
                </div>

                <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                    Sell products and manage your store.
                </p>
            </div>
        </label>

    </div>
</div>

               <button type="submit"
                  class="w-full py-2 px-3.5 text-sm rounded-md font-semibold cursor-pointer tracking-wide text-white border border-blue-600 bg-blue-600 hover:bg-blue-700 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                  Sign in</button>

               <div class="text-slate-900 text-sm text-center dark:text-slate-50">Don't have an account? <a href="/login"
                     class="text-blue-700 hover:underline ml-1 font-medium dark:text-blue-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">Sign
                     in</a>
               </div>
            </form>
         </div>
      </div>
   </div>

</x-layout>