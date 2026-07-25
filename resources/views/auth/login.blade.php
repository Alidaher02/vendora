<x-layout>

<main class="bg-gray-50 px-4 md:px-8 dark:bg-neutral-900">

   <div class="min-h-screen flex flex-col items-center mt-10">
      <div class="max-w-md w-full">
         <div
            class="p-6 rounded-lg bg-white border border-slate-300 shadow-xs md:p-8 dark:bg-neutral-800 dark:border-neutral-700">
            <h1 class="text-slate-900 text-center text-3xl font-bold dark:text-slate-50">Sign In</h1>

            <form class="space-y-6 mt-10" method="POST" action="/login">
            @csrf

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
</main>

</x-layout>