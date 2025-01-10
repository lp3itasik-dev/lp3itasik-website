<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Politeknik LP3I Kampus Tasikmalaya adalah kampus vokasi di Priangan Timur dengan penempatan kerja. Tepat dan Cepat Kerja!">
    <meta name="author" content="Politeknik LP3I Kampus Tasikmalaya" />
    <meta name="keywords"
        content="Kampus Penempatan Kerja, Kampus Tasikmalaya, Kuliah di Tasikmalaya, Kampus Dengan Penempatan kerja, Kuliah Sambil Kerja, Tasikmalaya, Kampus Vokasi, LP3I Tasikmalaya, Politeknik LP3I Kampus Tasikmalaya, LP3I, Tepat dan Cepat Kerja, Kuliah murah di Tasikmalaya">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon.png') }}">
    <title>{{ config('app.name', 'Politeknik LP3I Kampus Tasikmalaya') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <style>
        html,
        body {
            scroll-behavior: smooth;
        }
    </style>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1619608988416288');
        fbq('track', 'PageView');
    </script>
    <!-- End Meta Pixel Code -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="{{ asset('js/all.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
