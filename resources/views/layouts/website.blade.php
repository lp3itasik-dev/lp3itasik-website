<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <nav class="bg-gradient-to-r from-cyan-600 via-cyan-500 to-cyan-600 p-5">
            <div class="container mx-auto flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0">
                <div class="flex items-center gap-5">
                    <div class="inline-block text-xs text-white drop-shadow">
                        <i class="fa-solid fa-phone"></i>
                        <span class="font-medium">(0265)311766</span>
                    </div>
                    <a href="https://wa.me/6281261122555" target="_blank" class="inline-block text-xs text-white drop-shadow">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span class="font-medium">08126-1122-555</span>
                    </a>
                </div>
                <ul class="flex items-center gap-3">
                    <li>
                        <a href="#" class="text-xs font-medium text-white drop-shadow">UPPM</a>
                    </li>
                    <li>
                        <a href="#" class="text-xs font-medium text-white drop-shadow">Virtual Kampus</a>
                    </li>
                </ul>
            </div>
        </nav>
        @include('layouts.navigation-website')
        <div>{{ $slot }}</div>
    </body>
    <script src="{{ asset('js/all.min.js') }}"></script>
</html>
