<x-employee-layout>
    <header class="py-28 px-8">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-5">
            <div class="space-y-8">
                <div class="space-y-4">
                    <h2 class="font-bold text-5xl">
                        {{ $program->level }} {{ $program->title }}
                    </h2>
                    <p class="text-gray-700">LP3I hadir dengan kuliah mendukungmu untuk kuliah sambil bekerja, karir
                        unggul, impian terwujud.
                        Bergabunglah dan raih kesuksesan bersama kami sekarang!</p>
                </div>
            </div>
            <div class="flex items-center justify-center md:justify-end">
                <img src="{{ asset('images/cover-employee.png') }}" alt="Hero" class="w-96" />
            </div>
        </div>
    </header>
    <section class="bg-gradient-to-r from-lp3i-500 via-lp3i-200 to-lp3i-400 border-t-8 border-lp3i-emerald-100 drop-shadow-lg py-10">
        <div class="container mx-auto px-8 pb-8">
            <div class="text-center space-y-2 mb-10">
                <h2 class="font-bold text-2xl text-white drop-shadow">Kenapa Harus Politeknik LP3I?</h2>
                <p class="text-white drop-shadow">Berikut ini adalah beberapa alasan kenapa harus Politeknik LP3I.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div
                    class="text-center bg-white hover:bg-gray-50 border-b-8 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out">
                    <i class="fa-solid fa-clock text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Waktu Fleksibel, Bisa Sambil Bekerja!</h2>
                    <p class="text-sm text-gray-600">Nikmati Waktu kuliah sambil bekerja, atur belajar sesuai kebutuhan
                        Anda.</p>
                </div>
                <div
                    class="text-center bg-white hover:bg-gray-50 border-b-8 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out">
                    <i class="fa-solid fa-coins text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Biaya Terjangkau, Bisa Dicicil!</h2>
                    <p class="text-sm text-gray-600">Hanya Rp600.000/bulan. Akses pendidikan berkualitas tanpa beban
                        finansial berlebih.</p>
                </div>
                <div
                    class="text-center bg-white hover:bg-gray-50 border-b-8 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out">
                    <i class="fa-solid fa-chalkboard-user text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Perkuliahaan Dilaksanakan Secara Hybrid (Online/Offline)</h2>
                    <p class="text-sm text-gray-600">Perkuliahan hybrid memungkinkan pembelajaran online dan offline
                        fleksibel.</p>
                </div>
                <div
                    class="text-center bg-white hover:bg-gray-50 border-b-8 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out">
                    <i class="fa-solid fa-users text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Kuota Terbatas</h2>
                    <p class="text-sm text-gray-600">Kuota Terbatas, hanya 30 orang. Segera daftar untuk mendapatkan
                        kursi!</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mx-auto p-8">
            <div class="owl-carousel carousel-two owl-theme">
                <div class="item">
                    <img src="{{ asset('images/doc-kk/KK-1.jpeg') }}" alt="KK-1">
                </div>
                <div class="item">
                    <img src="{{ asset('images/doc-kk/KK-2.jpeg') }}" alt="KK-2">
                </div>
                <div class="item">
                    <img src="{{ asset('images/doc-kk/KK-3.jpeg') }}" alt="KK-3">
                </div>
                <div class="item">
                    <img src="{{ asset('images/doc-kk/KK-4.jpeg') }}" alt="KK-4">
                </div>
                <div class="item">
                    <img src="{{ asset('images/doc-kk/KK-5.jpeg') }}" alt="KK-5">
                </div>
                <div class="item">
                    <img src="{{ asset('images/doc-kk/KK-6.jpeg') }}" alt="KK-6">
                </div>
                <div class="item">
                    <img src="{{ asset('images/doc-kk/KK-7.jpeg') }}" alt="KK-7">
                </div>
                <div class="item">
                    <img src="{{ asset('images/doc-kk/KK-8.jpeg') }}" alt="KK-8">
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $('.carousel-one').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                }
            });
            $('.carousel-two').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                }
            });
        </script>
    @endpush
</x-employee-layout>
