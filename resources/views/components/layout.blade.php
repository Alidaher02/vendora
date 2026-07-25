@props([
    'title' => 'vendora'
])

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vendor Dashboard — Vendora</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  body { background:#0a0e16; }
  .card { background:#10141f; border:1px solid #1f2530; }
  .glow-icon { background: linear-gradient(135deg,#4f7cff,#8b5cf6); }
</style>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full  text-gray-200">


<x-nav />

<main>
{{ $slot }}
</main>
</div>



    
</body>
</html>        
