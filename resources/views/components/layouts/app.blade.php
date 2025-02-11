<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- If using Vite --}}
    @livewireStyles
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        {{ $slot ?? '' }}
    </div>

    @livewireScripts
</body>
</html>
