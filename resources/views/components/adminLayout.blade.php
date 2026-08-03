@props([
    'title' => 'vendora'
])

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{$title}}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  body { background:#0a0e16; }
  .card { background:#10141f; border:1px solid #1f2530; }
  .glow-icon { background: linear-gradient(135deg,#4f7cff,#8b5cf6); }
</style>
@vite(['resources/css/app.css'])
</head>
<body class="h-full  text-gray-200">


<aside class="hidden md:fixed top-0 left-0 md:flex h-screen w-64 flex-col border-r border-[#1f2530] bg-[#0a0e16]">

    <!-- Logo -->
    <div class="flex h-16 items-center border-b border-[#1f2530] px-6">
        <h1 class="text-xl font-bold text-white">
            Vend<span class="text-blue-500">ora</span>
        </h1>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto px-4 py-6">

        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-widest text-gray-500">
            Main
        </p>

        <a href="/admin"
            @class([
                'mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium transition',
                'text-gray-400 hover:bg-white/5 hover:text-white' => !request()->is('admin'),
                'border-l-4 border-blue-500 bg-blue-500/10 text-blue-400' => request()->is('admin'),
            ])>
            <i class="fa-solid fa-chart-line w-5 text-center"></i>
            Dashboard
        </a>

        <a href="/admin/stores"
            @class([
                'mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium transition',
                'text-gray-400 hover:bg-white/5 hover:text-white' => !request()->is('admin/stores'),
                'border-l-4 border-blue-500 bg-blue-500/10 text-blue-400' => request()->is('admin/stores'),
            ])>
            <i class="fa-solid fa-store w-5 text-center"></i>
            Store Requests
        </a>

        <a href="/admin/products"
            @class([
                'mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium transition',
                'text-gray-400 hover:bg-white/5 hover:text-white' => !request()->is('admin/products'),
                'border-l-4 border-blue-500 bg-blue-500/10 text-blue-400' => request()->is('admin/products'),
            ])>
            <i class="fa-solid fa-box w-5 text-center"></i>
            Products
        </a>

        <a href="/admin/store"
            @class([
                'mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium transition',
                'text-gray-400 hover:bg-white/5 hover:text-white' => !request()->is('admin/categories'),
                'border-l-4 border-blue-500 bg-blue-500/10 text-blue-400' => request()->is('admin/store'),
            ])>
            <i class="fa-solid fa-layer-group w-5 text-center"></i>
            Stores
        </a>

        <a href="/admin/orders"
            @class([
                'mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium transition',
                'text-gray-400 hover:bg-white/5 hover:text-white' => !request()->is('admin/orders'),
                'border-l-4 border-blue-500 bg-blue-500/10 text-blue-400' => request()->is('admin/orders'),
            ])>
            <i class="fa-solid fa-cart-shopping w-5 text-center"></i>
            Orders
        </a>

        <hr class="my-5 border-[#1f2530]">

        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-widest text-gray-500">
            Management
        </p>

        <a href="/admin/vendors"
            @class([
                'mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium transition',
                'text-gray-400 hover:bg-white/5 hover:text-white' => !request()->is('admin/vendors'),
                'border-l-4 border-blue-500 bg-blue-500/10 text-blue-400' => request()->is('admin/vendors'),
            ])>
            <i class="fa-solid fa-shop w-5 text-center"></i>
            Vendors
        </a>

        <a href="/admin/customers"
            @class([
                'mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium transition',
                'text-gray-400 hover:bg-white/5 hover:text-white' => !request()->is('admin/customers'),
                'border-l-4 border-blue-500 bg-blue-500/10 text-blue-400' => request()->is('admin/customers'),
            ])>
            <i class="fa-solid fa-users w-5 text-center"></i>
            Customers
        </a>

        <a href="/admin/reviews"
            @class([
                'mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium transition',
                'text-gray-400 hover:bg-white/5 hover:text-white' => !request()->is('admin/reviews'),
                'border-l-4 border-blue-500 bg-blue-500/10 text-blue-400' => request()->is('admin/reviews'),
            ])>
            <i class="fa-solid fa-star w-5 text-center"></i>
            Reviews
        </a>

        <a href="/admin/settings"
            class="mb-1 flex h-10 items-center gap-3 rounded-lg px-3 text-sm font-medium text-gray-400 transition hover:bg-white/5 hover:text-white">
            <i class="fa-solid fa-gear w-5 text-center"></i>
            Settings
        </a>

    </nav>

    <!-- Bottom User -->
    <div class="border-t border-[#1f2530] p-4">

        <div class="mb-4 flex items-center gap-3">

            <div
                class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-500/15 text-sm font-bold text-blue-400">
                A
            </div>

            <div>
                <h4 class="text-sm font-semibold text-white">
                    Admin
                </h4>

                <p class="text-xs text-gray-500">
                    Administrator
                </p>
            </div>

        </div>

        <form action="/logout" method="POST">
            @csrf
            @method('DELETE')

            <button
                class="flex h-10 w-full cursor-pointer items-center justify-center gap-2 rounded-lg border border-[#2b3443] text-sm font-medium text-gray-300 transition hover:border-red-500/40 hover:bg-red-500/10 hover:text-red-400">

                <i class="fa-solid fa-right-from-bracket"></i>
                Logout

            </button>

        </form>

    </div>

</aside>

<main class="md:ml-64 min-h-screen p-2 md:p-5">

{{ $slot }}
</main>
</div>



    
</body>
</html>        
