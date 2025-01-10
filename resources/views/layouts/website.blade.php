<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon.png') }}">
    <title>{{ config('app.name', 'Politeknik LP3I Kampus Tasikmalaya') }}</title>
    <meta name="description"
        content="Politeknik LP3I Kampus Tasikmalaya adalah kampus vokasi di Priangan Timur dengan penempatan kerja. Tepat dan Cepat Kerja!">
    <meta name="author" content="Politeknik LP3I Kampus Tasikmalaya" />
    <meta name="keywords"
        content="Kampus Penempatan Kerja, Kampus Tasikmalaya, Kuliah di Tasikmalaya, Kampus Dengan Penempatan kerja, Kuliah Sambil Kerja, Tasikmalaya, Kampus Vokasi, LP3I Tasikmalaya, Politeknik LP3I Kampus Tasikmalaya, LP3I, Tepat dan Cepat Kerja, Kuliah murah di Tasikmalaya">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

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

<body class="font-sans text-gray-900 antialiased">
    @stack('components')
    <nav class="bg-gradient-to-r from-cyan-600 via-cyan-500 to-cyan-600 p-5">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center gap-3 md:gap-0">
            <div class="flex items-center gap-5">
                <div class="inline-block text-xs text-white drop-shadow">
                    <i class="fa-solid fa-phone"></i>
                    <span class="font-medium">(0265)311766</span>
                </div>
                <a href="https://wa.me/6281261122555" target="_blank"
                    class="inline-block text-xs text-white drop-shadow">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span class="font-medium">08126-1122-555</span>
                </a>
            </div>
            <ul class="flex items-center gap-3">
                {{-- <li>
                    <a href="#" class="text-xs font-medium text-white drop-shadow">UPPM</a>
                </li> --}}
                <li>
                    <a href="https://virtualkampus.politekniklp3i-tasikmalaya.ac.id" target="_blank"
                        class="text-xs font-medium text-white drop-shadow space-x-1">
                        <span>Virtual Kampus</span>
                        <i class="fa-solid fa-external-link"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    @include('layouts.navigation-website')
    <div>{{ $slot }}</div>
    @include('layouts.footer-website')
    <div class="fixed right-0 bottom-0 z-50">
        <a href="{{ route('redirect-link') }}" target="_blank" class="flex items-center justify-center drop-shadow-lg">
            <lottie-player src="{{ asset('animations/whatsapp.json') }}" background="Transparent" speed="1"
                style="width: 100px; height: 100px" direction="1" mode="normal" loop autoplay></lottie-player>
        </a>
    </div>
</body>
<script src="{{ asset('js/lottie.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script>
    function hiddenPopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>
@stack('scripts')

</html>
