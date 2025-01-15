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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

<body style="background-image: url('{{ asset('images/background-campus.jpg') }}')" class="bg-center bg-cover bg-gray-900 bg-blend-multiply flex flex-col justify-center items-center py-10"">
    <div class="container max-w-lg mx-auto flex flex-col items-center justify-center gap-5 px-5 md:px-0">
        <div class="profile-card bg-white rounded-2xl shadow-lg p-3 space-y-4">
            <div class="flex flex-col justify-center items-center gap-5 bg-[#F5F8FC] p-5 rounded-2xl">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo/logo-lp3i.svg') }}" alt="" class="h-12 logo-one">
                    <img src="{{ asset('images/logo/tagline-warna.svg') }}" alt="" class="h-12 logo-two">
                </div>
                <div class="text-center space-y-1">
                    <h3 class="font-bold text-lg text-gray-900 title">
                        Katalog Layanan Mahasiswa
                    </h3>
                    <p class="text-sm text-gray-700 desc">Layanan yang mencakup berbagai fasilitas digital untuk mendukung kebutuhan akademis dan administratif.</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-3">
                <a href="https://www.instagram.com/lp3i.tasik" target="_blank" class="text-gray-700 hover:text-sky-600 sosmed-1">
                    <i class="fa-brands fa-instagram text-2xl"></i>
                </a>
                <a href="https://www.facebook.com/lp3i.tasik" target="_blank" class="text-gray-700 hover:text-sky-600 sosmed-2">
                    <i class="fa-brands fa-facebook text-2xl"></i>
                </a>
                <a href="https://www.threads.net/@lp3i.tasik" target="_blank" class="text-gray-700 hover:text-sky-600 sosmed-3">
                    <i class="fa-brands fa-threads text-2xl"></i>
                </a>
                <a href="https://www.tiktok.com/@lp3i.tasik" target="_blank" class="text-gray-700 hover:text-sky-600 sosmed-4">
                    <i class="fa-brands fa-tiktok text-2xl"></i>
                </a>
                <a href="https://www.youtube.com/lp3itasik" target="_blank" class="text-gray-700 hover:text-sky-600 sosmed-5">
                    <i class="fa-brands fa-youtube text-2xl"></i>
                </a>
                <a href="https://politekniklp3i-tasikmalaya.ac.id" target="_blank" class="text-gray-700 hover:text-sky-600 sosmed-6">
                    <i class="fa-solid fa-globe text-2xl"></i>
                </a>
            </div>
        </div>
        <div class="w-full grid grid-cols-2 md:grid-cols-2 gap-3">
            <a href="https://customer-care.politekniklp3i-tasikmalaya.ac.id" target="_blank" class="relative bg-lp3i-100 hover:bg-lp3i-200 p-4 rounded-xl space-y-1 drop-shadow-lg text-center link-1">
                <h4 class="text-white text-center font-bold text-sm">Customer Care</h4>
                <p class="text-xs text-white/60 font-light">Tempat menampung saran dan masukan mahasiswa secara efektif.</p>
                <i class="z-[-1] absolute right-5 bottom-8 fa-solid fa-arrow-up-right-from-square text-white/10 fa-2x"></i>
            </a>
            <a href="https://siruang.politekniklp3i-tasikmalaya.ac.id" target="_blank" class="relative bg-lp3i-100 hover:bg-lp3i-200 p-4 rounded-xl space-y-1 drop-shadow-lg text-center link-2">
                <h4 class="text-white text-center font-bold text-sm">SIRUANG</h4>
                <p class="text-xs text-white/60 font-light">Untuk informasi ketersediaan dan peminjaman ruangan kelas.</p>
                <i class="z-[-1] absolute right-5 bottom-8 fa-solid fa-arrow-up-right-from-square text-white/10 fa-2x"></i>
            </a>
            <a href="https://siakad.plb.ac.id" target="_blank" class="relative bg-lp3i-100 hover:bg-lp3i-200 p-4 rounded-xl space-y-1 drop-shadow-lg text-center link-3">
                <h4 class="text-white text-center font-bold text-sm">SIAKAD PLB</h4>
                <p class="text-xs text-white/60 font-light">Untuk akses informasi akademik mahasiswa reguler dengan mudah.</p>
                <i class="z-[-1] absolute right-5 bottom-8 fa-solid fa-arrow-up-right-from-square text-white/10 fa-2x"></i>
            </a>
            <a href="https://siakad.politekniklp3i-tasikmalaya.ac.id/siakad" target="_blank" class="relative bg-lp3i-100 hover:bg-lp3i-200 p-4 rounded-xl space-y-1 drop-shadow-lg text-center link-4">
                <h4 class="text-white text-center font-bold text-sm">SIAKAD Otomotif</h4>
                <p class="text-xs text-white/60 font-light">Untuk akses informasi akademik mahasiswa otomotif dengan mudah.</p>
                <i class="z-[-1] absolute right-5 bottom-8 fa-solid fa-arrow-up-right-from-square text-white/10 fa-2x"></i>
            </a>
            <a href="https://pmb.politekniklp3i-tasikmalaya.ac.id" target="_blank" class="relative bg-lp3i-100 hover:bg-lp3i-200 p-4 rounded-xl space-y-1 drop-shadow-lg text-center link-5">
                <h4 class="text-white text-center font-bold text-sm">PMB Online</h4>
                <p class="text-xs text-white/60 font-light">memudahkan pendaftaran, akses profil, akun dan unggah berkas.</p>
                <i class="z-[-1] absolute right-5 bottom-8 fa-solid fa-arrow-up-right-from-square text-white/10 fa-2x"></i>
            </a>
        </div>
    </div>
    <div class="fixed right-5 bottom-0">
        <a href="https://politekniklp3i-tasikmalaya.ac.id/penerimaan-mahasiswa" target="_blank"
            class="relative flex items-center justify-center whatsapp">
            <p class="absolute top-[-20px] bg-white/50 px-3 py-2 rounded-xl text-xs text-white font-medium drop-shadow">Info PMB?</p>
            <lottie-player src="{{ asset('animations/whatsapp.json') }}" background="Transparent" speed="1"
                style="width: 100px; height: 100px" direction="1" mode="normal" loop autoplay></lottie-player>
        </a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/lottie.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script>
        gsap.from(".profile-card", {
            duration: 2.5,
            scale: 0,
            delay: 0.3,
            rotation: -30,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".logo-one", {
            duration: 2.5,
            y: -200,
            rotation: -30,
            delay: 0.4,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".logo-two", {
            duration: 2.5,
            y: -200,
            rotation: -30,
            delay: 0.5,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".title", {
            duration: 0.7,
            opacity: 0,
            delay: 0.7,
            y: 100
        });
        gsap.from(".desc", {
            duration: 0.7,
            opacity: 0,
            delay: 0.8,
            y: 100
        });
        gsap.from(".sosmed-1", {
            duration: 2.5,
            y: -200,
            rotation: -30,
            delay: 0.4,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".sosmed-2", {
            duration: 2.5,
            y: -200,
            rotation: -30,
            delay: 0.5,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".sosmed-3", {
            duration: 2.5,
            y: -200,
            rotation: -30,
            delay: 0.6,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".sosmed-4", {
            duration: 2.5,
            y: -200,
            rotation: -30,
            delay: 0.7,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".sosmed-5", {
            duration: 2.5,
            y: -200,
            rotation: -30,
            delay: 0.8,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".sosmed-6", {
            duration: 2.5,
            y: -200,
            rotation: -30,
            delay: 0.9,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".link-1", {
            duration: 2.5,
            y: -500,
            rotation: -30,
            delay: 1,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".link-2", {
            duration: 2.5,
            y: -500,
            rotation: -30,
            delay: 1.1,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".link-3", {
            duration: 2.5,
            y: -700,
            rotation: -30,
            delay: 1.2,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".link-4", {
            duration: 2.5,
            y: -700,
            rotation: -30,
            delay: 1.3,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".link-5", {
            duration: 2.5,
            y: -700,
            rotation: -30,
            delay: 1.4,
            ease: "elastic.out(1,0.3)"
        });
        gsap.from(".whatsapp", {
            duration: 2.5,
            y: 200,
            rotation: -50,
            delay: 1.5,
            ease: "elastic.out(1,0.3)"
        });
    </script>
</body>

</html>
