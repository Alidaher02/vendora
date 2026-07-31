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
@vite(['resources/css/app.css', 'resources/js/customerApp.js'])
</head>
<body class="h-full  text-gray-200">


<x-nav />

<main>
{{ $slot }}
</main>
</div>


<div id="pageLoader"
     class="fixed inset-0 z-50 flex items-center justify-center bg-[#0b0f14]">
    
<div class="h-14 w-14 animate-spin rounded-full border-4 border-white/20 border-t-blue-500"></div>

</div>

<script>
    window.addEventListener("load", () => {
        const loader = document.getElementById("pageLoader");

        setTimeout(() => {
            loader.classList.add("opacity-0");

            setTimeout(() => {
                loader.style.display = "none";
            }, 500);

        }, 1000); // loader stays for 1 second
    });
</script>
    
</body>
</html>        
