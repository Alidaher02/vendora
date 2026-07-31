
<x-layout>
@if(!$store)
<div class="min-h-screen bg-neutral-950 flex items-center justify-center px-6 py-10">

    <div class="w-full max-w-[48rem]">

        <div class="card rounded-xl p-7">


            <!-- Header -->

            <h3 class="text-white text-xl font-bold">
                Create Your Store
            </h3>

            <p class="text-sm text-gray-400 mt-1">
                Set up your store information and wait for admin approval.
            </p>



                <form action="/vendor"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-4 mt-6">


                    @csrf



                    <!-- Store Name -->

                    <div>

                        <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                            Store Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            placeholder="Example: Ali Electronics"
                            class="px-4 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">

                    </div>

                    <x-forms.error name="name" />



                    <!-- Description -->

                    <div>

                        <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="3"
                            placeholder="Tell customers about your store..."
                            class="px-4 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500 resize-none"></textarea>

                    </div>


                    <x-forms.error name="description" />

                    <!-- Address -->

                    <div>

                        <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                            Address
                        </label>

                        <input
                            type="text"
                            name="address"
                            placeholder="Beirut, Lebanon"
                            class="px-4 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">

                    </div>

                    <x-forms.error name="address" />






                    <!-- Phone + Slug -->

                    <div class="grid grid-cols-2 gap-5">


                        <div>

                            <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                placeholder="+961..."
                                class="px-4 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">

                        </div>
                    <x-forms.error name="phone" />



                        <div>

                            <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                                Slug
                            </label>

                            <input
                                type="text"
                                name="slug"
                                placeholder="ali-electronics"
                                class="px-4 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">

                        </div>
                    <x-forms.error name="slug" />


                    </div>





                    <!-- Logo + Banner -->

                    <div class="grid grid-cols-2 gap-5">


                        <div>

                            <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                                Store Logo
                            </label>

                            <input
                                type="file"
                                name="image"
                                accept="image/*"
                                class="text-sm text-gray-300 rounded-lg bg-[#0a0e16] w-full border border-[#2a3140]
                                file:mr-2 file:py-2 file:px-3 file:border-0
                                file:text-sm file:bg-[#1a1f2b] file:text-gray-200">

                        </div>
                        <x-forms.error name="image" />




                    </div>





                    <x-forms.error name="slug" />





                    <!-- Buttons -->

                    <div class="flex items-center gap-3 pt-3">


                        <button
                            type="submit"
                            class="flex-1 py-2.5 cursor-pointer text-sm rounded-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-all">

                            Submit For Approval

                        </button>

                    </div>



                </form>


        </div>


    </div>


</div>
@elseif($store->status === App\Enums\StoreStatus::PENDING)
<div class="min-h-screen bg-neutral-950 flex items-center justify-center px-6 py-10">

    <div class="w-full max-w-6xl">

        <div class="bg-neutral-900 border border-neutral-800 rounded-3xl shadow-2xl p-8">

            <div class="grid lg:grid-cols-2 gap-10">

                <!-- Left Side -->
                <div class="flex flex-col justify-center items-center text-center">

                    <div
                        class="w-44 h-44 rounded-full bg-blue-500/10 border border-blue-500/20 flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-24 h-24 text-blue-500"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M3 9l9-6 9 6v10a2 2 0 01-2 2h-4v-6H9v6H5a2 2 0 01-2-2V9z"/>

                        </svg>

                    </div>

                    <h1 class="text-4xl font-bold text-white mt-8">
                        Your Store is Under Review
                    </h1>

                    <p class="text-blue-400 text-lg mt-3">
                        Thank you for creating your store!
                    </p>

                    <p class="text-gray-400 leading-8 mt-6 max-w-md">
                        Our team is reviewing your store information to ensure
                        a safe marketplace. Once approved you'll instantly gain
                        access to your vendor dashboard.
                    </p>

                    <div
                        class="w-full mt-8 bg-neutral-800 border border-neutral-700 rounded-2xl p-5">

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center">

                                📧

                            </div>

                            <div class="text-left">

                                <h3 class="text-white font-semibold">
                                    Email Notification
                                </h3>

                                <p class="text-gray-400 text-sm">
                                    We'll notify you immediately after approval.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Right Side -->
                <div>

                    <div
                        class="bg-neutral-800 border border-neutral-700 rounded-2xl p-6">

                        <h2 class="text-white text-xl font-semibold mb-5">
                            Store Status
                        </h2>

                        <div
                            class="bg-yellow-500/15 border border-yellow-500/30 rounded-xl p-4 flex items-center gap-4">

                            <div
                                class="w-12 h-12 rounded-full bg-yellow-500/20 flex items-center justify-center text-yellow-400 text-xl">

                                🕒

                            </div>

                            <div>

                                <h3 class="text-yellow-400 font-bold text-lg">
                                    Pending Approval
                                </h3>

                                <p class="text-gray-300 text-sm">
                                    Your store is waiting for admin approval.
                                </p>

                            </div>

                        </div>

                        <div class="mt-8 space-y-5">

                            <div
                                class="flex justify-between items-center border-b border-neutral-700 pb-4">

                                <span class="text-gray-400">
                                    Submitted On
                                </span>

                                <span class="text-white">
                                    {{ $store?->created_at?->format('d M Y') }}
                                </span>

                            </div>

                            <div
                                class="flex justify-between items-center border-b border-neutral-700 pb-4">

                                <span class="text-gray-400">
                                    Estimated Review
                                </span>

                                <span class="text-white">
                                    Within 24 Hours
                                </span>

                            </div>

                        </div>

                    </div>

                    <!-- Timeline -->

                    <div
                        class="bg-neutral-800 border border-neutral-700 rounded-2xl p-6 mt-6">

                        <h2 class="text-white text-xl font-semibold mb-6">
                            Review Progress
                        </h2>

                        <div class="space-y-6">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center">

                                    ✓

                                </div>

                                <span class="text-gray-200">
                                    Store information submitted
                                </span>

                            </div>

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center">

                                    ✓

                                </div>

                                <span class="text-gray-200">
                                    Documents received
                                </span>

                            </div>

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-9 h-9 rounded-full bg-yellow-500 animate-pulse flex items-center justify-center">

                                    ⏳

                                </div>

                                <span class="text-yellow-400 font-semibold">
                                    Waiting for admin approval
                                </span>

                            </div>

                            <div class="flex items-center gap-4 opacity-50">

                                <div
                                    class="w-9 h-9 rounded-full bg-neutral-700 flex items-center justify-center">

                                    🔒

                                </div>

                                <span class="text-gray-500">
                                    Store dashboard unlocked
                                </span>

                            </div>

                        </div>

                    </div>

                    <!-- Buttons -->

                    <div class="grid grid-cols-2 gap-4 mt-6">

                        <a href="#" onclick="document.getElementById('edit_store_modal').showModal()"
                           class="btn bg-transparent border border-blue-500 hover:bg-blue-500 text-white rounded-xl">

                            Edit Store

                        </a>

                        <button
                            onclick="location.reload()"
                            class="btn btn-primary rounded-xl">

                            Refresh Status

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- Bottom Notice -->

        <div
            class="bg-neutral-900 border border-neutral-800 rounded-2xl mt-8 p-6">

            <div class="flex items-center gap-4">

                <div
                    class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center">

                    🛡️

                </div>

                <div>

                    <h3 class="text-white font-semibold">
                        Almost Ready!
                    </h3>

                    <p class="text-gray-400 mt-1">
                        Once your store has been approved, you'll be able to
                        access your dashboard, add products, manage orders,
                        and start selling immediately.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>
@elseif($store->status === App\Enums\StoreStatus::REJECTED)
<div class="min-h-screen bg-neutral-950 flex items-center justify-center px-6 py-10">

    <div class="w-full max-w-4xl">

        <div class="bg-neutral-900 border border-red-500/20 rounded-3xl shadow-2xl p-10">

            <div class="flex flex-col items-center text-center">

                <!-- Icon -->
                <div class="w-28 h-28 rounded-full bg-red-500/10 border border-red-500/20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-14 h-14 text-red-500"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>

                <h1 class="text-4xl font-bold text-white mt-8">
                    Store Request Rejected
                </h1>

                <p class="text-gray-400 mt-4 max-w-xl leading-8">
                    Unfortunately, your store request wasn't approved.
                    Please review the reason below, update your information,
                    and submit your request again.
                </p>

                <!-- Status -->
                <div class="mt-8 inline-flex items-center gap-3 bg-red-500/10 border border-red-500/20 px-6 py-3 rounded-xl">
                    <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                    <span class="text-red-400 font-semibold">
                        Rejected
                    </span>
                </div>

                <!-- Details -->
                <div class="w-full mt-10 bg-neutral-800 border border-neutral-700 rounded-2xl p-6 text-left">

                    <h2 class="text-white font-semibold text-lg mb-4">
                        Review Details
                    </h2>

                    <div class="space-y-5">

                        <div class="flex justify-between border-b border-neutral-700 pb-3">
                            <span class="text-gray-400">Submitted On</span>
                            <span class="text-white">
                                {{ $store?->created_at?->format('d M Y') }}
                            </span>
                        </div>

                        <div class="flex justify-between border-b border-neutral-700 pb-3">
                            <span class="text-gray-400">Reviewed On</span>
                            <span class="text-white">
                                {{ now()->format('d M Y') }}
                            </span>
                        </div>

                        <div>
                            <p class="text-gray-400 mb-2">
                                Reason for Rejection
                            </p>

                            <div class="bg-red-500/10 border border-red-500/20 rounded-xl p-4 text-red-300">
                                {{ $store->rejection_reason ?? 'Your submitted information needs to be corrected before approval.' }}
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Notice -->
                <div class="w-full mt-6 bg-yellow-500/10 border border-yellow-500/20 rounded-2xl p-5 text-left">

                    <h3 class="text-yellow-400 font-semibold">
                        What should you do next?
                    </h3>

                    <ul class="list-disc ml-5 mt-3 text-gray-300 space-y-2">
                        <li>Review the rejection reason carefully.</li>
                        <li>Update your store information.</li>
                        <li>Correct any missing or incorrect details.</li>
                        <li>Submit your store again for approval.</li>
                    </ul>

                </div>

                <!-- Buttons -->
                <div class="flex gap-4 mt-10">

                    <a href="#" onclick="document.getElementById('edit_store_modal').showModal()"
                       class="btn btn-primary rounded-xl">
                        Edit Store
                    </a>

                    <a href="#"
                       class="btn btn-outline border-red-500 text-red-400 hover:bg-red-500 hover:text-white rounded-xl">
                        Submit Again
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>
@elseif($store->status === App\Enums\StoreStatus::APPROVED)
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 shrink-0 bg-[#0a0e16] border-r border-[#1f2530] flex flex-col">

        <!-- Store mini card -->
        <div class="mx-4 mt-4 p-4 rounded-lg card flex items-center gap-3">
            <div class="h-10 w-10 rounded-lg glow-icon flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-white">{{ $store?->name }}</p>
                <a href="#" class="text-xs text-blue-400 hover:underline inline-flex items-center gap-1">
                    View Store
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Nav -->
        <nav class="mt-6 px-3 flex-1">
            <p class="px-2 text-xs font-semibold text-gray-500 tracking-wider mb-2">MAIN</p>
            <ul class="space-y-1">
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    Dashboard
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium bg-blue-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l2-4h14l2 4M3 7h18M3 7v11a2 2 0 002 2h14a2 2 0 002-2V7M9 11a3 3 0 006 0" /></svg>
                    Store
                </a></li>
                <li><a href="/products" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    Products
                </a></li>
                <li><a href="/categories" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <span class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                        Categories
                    </span>
                    <span class="text-xs font-semibold bg-red-500 text-white rounded-full px-1.5 py-0.5">12</span>
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-5.13a4 4 0 11-8 0 4 4 0 018 0zm6 3a4 4 0 10-3-6.65" /></svg>
                    Customers
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.539 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.57-1.838-.196-1.539-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                    Reviews
                </a></li>
                <li><a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    Analytics
                </a></li>
            </ul>

        </nav>

    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col min-w-0">

        <!-- Topbar -->


        <main class="flex-1 px-6 py-6 overflow-y-auto">

            <h1 class="text-2xl font-bold text-white mb-5">My Store</h1>

            <!-- Store banner -->
            <div class="relative rounded-xl overflow-hidden border border-[#1f2530] h-48 bg-gradient-to-br from-[#1a1330] via-[#241a3d] to-[#0f1420]">
                <div class="absolute inset-0 opacity-40" style="background-image: radial-gradient(circle at 30% 30%, #7c3aed55, transparent 60%), radial-gradient(circle at 80% 60%, #2563eb55, transparent 55%);">
                            <img class="w-full object-cover" src="{{ asset('storage/' .$store?->image   ) }}">
                </div>
            </div>

            <div class="card rounded-xl px-6 pb-5 -mt-10 relative flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                <div class="flex items-end gap-4 pt-4">
                    <div class="h-20 w-20 rounded-xl glow-icon flex items-center justify-center border-4 border-[#10141f] shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7l2-4h14l2 4M3 7h18M3 7v11a2 2 0 002 2h14a2 2 0 002-2V7M9 11a3 3 0 006 0" />
                            </svg>
                    </div>
                    <div class="pb-1">
                        <div class="flex items-center gap-2">
                            <h2 class="text-xl font-bold text-white">{{$store->name}}</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.49 4.49 0 01-1.307 3.497 4.49 4.49 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="flex items-center gap-1 mt-1 text-sm text-amber-400">
                            ★★★★★ <span class="text-gray-400 ml-1">(4.8) · 128 Reviews</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-4 mt-2 text-xs text-gray-400">
                            <span class="inline-flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                               {{ $store->address }}
                            </span>
                            <span class="inline-flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                {{ $store->phone }}
                            </span>
                            <span class="inline-flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                {{ $store->vendor->email }}
                            </span>
                        </div>
                    </div>
                </div>
                <button
                onclick="document.getElementById('edit_store_modal').showModal()"
                 class="rounded-lg border border-[#2a3140] px-4 py-2 text-sm font-medium text-white hover:bg-white/5 cursor-pointer shrink-0">
                    Edit Store
                </button>
            </div>

            <!-- Stats + Quick actions -->
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mt-6">

                <div class="card rounded-xl p-4">
                    <div class="h-9 w-9 rounded-lg bg-blue-500/10 flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    </div>
                    <p id="productsCount" class="text-2xl font-bold text-white">0</p>
                    <p class="text-xs text-gray-400 mt-0.5">Products</p>
                    <a href="#" class="text-xs text-blue-400 hover:underline inline-flex items-center gap-1 mt-2">View all products →</a>
                </div>

                <div class="card rounded-xl p-4">
                    <div class="h-9 w-9 rounded-lg bg-purple-500/10 flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    <p class="text-2xl font-bold text-white">134</p>
                    <p class="text-xs text-gray-400 mt-0.5">Orders</p>
                    <a href="#" class="text-xs text-blue-400 hover:underline inline-flex items-center gap-1 mt-2">View all orders →</a>
                </div>

                <div class="card rounded-xl p-4">
                    <div class="h-9 w-9 rounded-lg bg-pink-500/10 flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V6m0 10v2m0-2c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <p class="text-2xl font-bold text-white">$4,520.00</p>
                    <p class="text-xs text-gray-400 mt-0.5">Revenue</p>
                    <a href="#" class="text-xs text-blue-400 hover:underline inline-flex items-center gap-1 mt-2">View analytics →</a>
                </div>

                <div class="card rounded-xl p-4">
                    <div class="h-9 w-9 rounded-lg bg-amber-500/10 flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.539 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.57-1.838-.196-1.539-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.077 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                    </div>
                    <p id="countCategories" class="text-2xl font-bold text-white">--</p>
                    <p class="text-xs text-gray-400 mt-0.5">Categories</p>
                    <a href="#" class="text-xs text-blue-400 hover:underline inline-flex items-center gap-1 mt-2">View all reviews →</a>
                </div>


            </div>
              

            <!-- Recent Orders -->
            <div class="flex items-center justify-between mt-8 mb-4">
                <h2 class="text-lg font-semibold text-white">Recent Orders</h2>
                <a href="#" class="text-sm text-blue-400 hover:underline inline-flex items-center gap-1">View all orders →</a>
            </div>

            <div class="card rounded-xl overflow-hidden mb-8">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-[#1f2530] text-left text-gray-500 text-xs uppercase tracking-wider">
                            <th class="px-4 py-3 font-medium">Order</th>
                            <th class="px-4 py-3 font-medium">Customer</th>
                            <th class="px-4 py-3 font-medium">Total</th>
                            <th class="px-4 py-3 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#1f2530]">
                        <tr>
                            <td class="px-4 py-3 text-gray-200">#ORD-2451</td>
                            <td class="px-4 py-3 text-gray-400">Nour Khalil</td>
                            <td class="px-4 py-3 text-gray-200">$95.00</td>
                            <td class="px-4 py-3"><span class="text-xs font-medium bg-green-500/15 text-green-400 rounded-full px-2 py-1">Delivered</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-gray-200">#ORD-2452</td>
                            <td class="px-4 py-3 text-gray-400">Karim Fadel</td>
                            <td class="px-4 py-3 text-gray-200">$35.00</td>
                            <td class="px-4 py-3"><span class="text-xs font-medium bg-blue-500/15 text-blue-400 rounded-full px-2 py-1">Shipped</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-gray-200">#ORD-2453</td>
                            <td class="px-4 py-3 text-gray-400">Layla Saad</td>
                            <td class="px-4 py-3 text-gray-200">$950.00</td>
                            <td class="px-4 py-3"><span class="text-xs font-medium bg-amber-500/15 text-amber-400 rounded-full px-2 py-1">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</div>
<!-- Add Category Modal -->
<dialog id="add_category_modal" class="modal p-0 rounded-xl backdrop:bg-black/60">
    <div class="card rounded-xl p-6 w-[32rem] max-w-[90vw]">
        <h3 class="text-white text-xl font-bold">Add Category</h3>
        <p class="text-sm text-gray-400 mt-1">List a new item in your store.</p>

                <form
                id="addCategoryForm"
                enctype="multipart/form-data"
                class="space-y-5 mt-6"  
                >
                @csrf
                    <div>
                        <label for="name" class="mb-2 text-gray-200 font-medium text-sm inline-block">Category name</label>
                        <input type="text" id="name" name="name" placeholder="e.g. Wireless Mouse" required
                            class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500" />
                    </div>
                                        <x-forms.error name="name" />
                    <div>
                        <label for="slug" class="mb-2 text-gray-200 font-medium text-sm inline-block">Slug</label>
                        <textarea id="slug" name="slug" rows="3" placeholder="Short description of the product" required
                            class="px-3 py-2.5 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                                <x-forms.error name="slug" />
                    <div>
                        <label for="image" class="mb-2 text-gray-200 font-medium text-sm inline-block">Category image</label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="text-sm text-gray-300 rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] file:mr-3 file:py-2 file:px-3 file:border-0 file:text-sm file:font-medium file:bg-[#1a1f2b] file:text-gray-200 hover:file:bg-[#232a38]" />
                    </div>
                                            <x-forms.error name="image" />
                    <div class="flex items-center gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 py-2.5 text-sm rounded-lg font-semibold cursor-pointer text-white bg-blue-600 hover:bg-blue-700 transition-all">
                            Add Category
                        </button>
                        <button type="button" onclick="document.getElementById('add_category_modal').close()"
                            class="flex-1 py-2.5 text-sm rounded-lg font-semibold cursor-pointer text-gray-200 border border-[#2a3140] hover:bg-white/5">
                            Cancel
                        </button>
                    </div>
                </form>
    </div>
</dialog>
@endif

<dialog id="edit_store_modal" class="modal p-0 rounded-xl backdrop:bg-black/60">
    <div class="card rounded-xl p-5 w-[42rem] max-w-[95vw]">

        <h3 class="text-white text-xl font-bold">Edit Store</h3>
        <p class="text-sm text-gray-400 mt-1">Update your store information.</p>

        <form action="/vendor"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-3 mt-5">

            @csrf
            @method('PATCH')

            <div>
                <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                    Store Name
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $store?->name) }}"
                    class="px-3 py-2 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                    Description
                </label>
                <textarea
                    name="description"
                    rows="2"
                    class="px-3 py-2 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">{{ old('description', $store?->description) }}</textarea>
            </div>

            <div>
                <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                    Address
                </label>
                <textarea
                    name="address"
                    rows="1"
                    class="px-3 py-2 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">{{ old('address', $store?->address) }}</textarea>
            </div>

            <div>
                <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                    Phone
                </label>
                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $store?->phone) }}"
                    class="px-3 py-2 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                        Logo
                    </label>
                    <input
                        type="file"
                        name="logo"
                        accept="image/*"
                        class="text-sm text-gray-300 rounded-lg bg-[#0a0e16] w-full border border-[#2a3140]
                        file:mr-2 file:py-1.5 file:px-3 file:border-0
                        file:text-sm file:bg-[#1a1f2b] file:text-gray-200">
                </div>

                <div>
                    <label class="mb-1.5 text-gray-200 font-medium text-sm inline-block">
                        Banner
                    </label>
                <input
                    type="text"
                    name="slug"
                    value="{{ old('SLUG', $store?->slug) }}"
                    class="px-3 py-2 text-sm text-white rounded-lg bg-[#0a0e16] w-full border border-[#2a3140] focus:outline-none focus:border-blue-500">
                </div>

            </div>

            <x-forms.error name="slug" />


            <div class="flex items-center gap-3 pt-2">

                <button
                    type="submit"
                    class="flex-1 py-2 text-sm rounded-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-all">
                    Save Changes
                </button>

                <button
                    type="button"
                    onclick="document.getElementById('edit_store_modal').close()"
                    class="flex-1 py-2 text-sm rounded-lg font-semibold text-gray-200 border border-[#2a3140] hover:bg-white/5">
                    Cancel
                </button>

            </div>

        </form>
    </div>
</dialog>


</x-layout>