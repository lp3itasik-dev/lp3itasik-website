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

<body class="flex flex-col justify-center items-center font-sans text-gray-900 antialiased h-screen bg-gray-100">
    <div class="max-w-md mx-auto space-y-10">
        <div class="flex justify-center">
            <img src="{{ asset('images/logo/logo-lp3i.svg') }}" alt="" class="h-20">
        </div>
        <div class="space-y-3">
            <h2 class="text-center text-gray-700 font-medium tracking-widest">Connecting...</h2>
            <p class="text-center text-sm text-gray-600">Halo! Kami sedang menyiapkan jalur eksklusif untuk langsung terhubung dengan tim kami
                melalui WhatsApp. Jangan khawatir, kami akan segera hadir untuk menjawab setiap pertanyaan Anda. Tetap
                bersama kami, ya!</p>
        </div>
    </div>
</body>
<script src="{{ asset('js/lottie.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            window.location.href = 'https://forms.gle/UqLyNAdcafMQF4PB8';
        }, 2000);
    });
</script>

</html>
