<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Politeknik LP3I Kampus Tasikmalaya') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col justify-center items-center font-sans text-gray-900 antialiased h-screen bg-gray-50">
    <div class="max-w-md mx-auto space-y-10">
        <div class="flex justify-center">
            <img src="{{ asset('images/logo/logo-lp3i.svg') }}" alt="" class="h-20">
        </div>
        <div class="w-full absolute bg-red-200 flex justify-center items-center">
            <lottie-player src="{{ asset('animations/server.json') }}" background="Transparent" speed="1"
                style="width: 200px; height: 200px" direction="1" mode="normal" loop autoplay></lottie-player>
        </div>
        <div class="space-y-3">
            <h2 class="text-center">Connecting...</h2>
            <p class="text-center">Halo! Kami sedang menyiapkan jalur eksklusif untuk langsung terhubung dengan tim kami
                melalui WhatsApp. Jangan khawatir, kami akan segera hadir untuk menjawab setiap pertanyaan Anda. Tetap
                bersama kami, ya!</p>
        </div>
    </div>
</body>
<script src="{{ asset('js/lottie.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>

</html>
