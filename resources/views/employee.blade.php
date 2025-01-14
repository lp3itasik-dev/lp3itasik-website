<x-employee-layout>
    @push('components')
        @include('components.popup-employee')
    @endpush
    <header class="py-28 px-8">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-5">
            <div class="space-y-8">
                <div class="space-y-4">
                    <h2 class="font-bold text-5xl">Kuliah Cepat Selesai Bebas Tugas Akhir/Skripsi</h2>
                    <p class="text-gray-700">LP3I hadir dengan kuliah mendukungmu untuk kuliah sambil bekerja, karir
                        unggul, impian terwujud.
                        Bergabunglah dan raih kesuksesan bersama kami sekarang!</p>
                </div>
                <a href="{{ route('redirect-link') }}" target="_blank"
                    class="inline-block bg-red-500 hover:bg-red-600 transition-all ease-in-out text-white px-5 py-2.5 border-b-4 border-red-600">Hubungi
                    Kami!</a>
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
    @if (count($programs_plt) > 0 || count($programs_plt_vokasi) > 0 || count($programs_plb) > 0)
        <section>
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-5 px-8 py-16">
                <div class="space-y-10 order-2 md:order-1">
                    @if (count($programs_plt) > 0)
                        <div class="space-y-4">
                            <div class="space-y-1">
                                <h2 class="font-bold text-lg">Politeknik LP3I Kampus Tasikmalaya</h2>
                                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Totam,
                                    possimus?
                                </p>
                            </div>
                            <ul class="space-y-3">
                                @foreach ($programs_plt as $program)
                                    <li class="border-l-8 border-lp3i-200 px-5">
                                        <a href="#"
                                            class="flex items-center gap-2 text-2xl font-bold hover:underline underline-offset-4">
                                            <span>{{ $program->level }} {{ $program->title }}</span>
                                            <i class="fa-solid fa-external-link text-sm"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (count($programs_plt_vokasi) > 0)
                        <div class="space-y-4">
                            <div class="space-y-1">
                                <h2 class="font-bold text-lg">Vokasi 2 Tahun LP3I Tasikmalaya</h2>
                                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Totam,
                                    possimus?
                                </p>
                            </div>
                            <ul class="space-y-3">
                                @foreach ($programs_plt_vokasi as $program)
                                    <li class="border-l-8 border-lp3i-emerald-100 px-5">
                                        <a href="#"
                                            class="flex items-center gap-2 text-2xl font-bold hover:underline underline-offset-4">
                                            <span>{{ $program->title }}</span>
                                            <i class="fa-solid fa-external-link text-sm"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (count($programs_plb) > 0)
                        <hr>
                        <div class="space-y-4">
                            <div class="space-y-1">
                                <h2 class="font-bold text-lg">Kampus Utama</h2>
                                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Totam,
                                    possimus?
                                </p>
                            </div>
                            <ul class="space-y-3">
                                @foreach ($programs_plb as $program)
                                    <li class="border-l-8 border-lp3i-red-100 px-5">
                                        <a href="#"
                                            class="flex items-center gap-2 text-2xl font-bold hover:underline underline-offset-4">
                                            <span>{{ $program->level }} {{ $program->title }}</span>
                                            <i class="fa-solid fa-external-link text-sm"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div
                    class="flex flex-col items-center justify-center gap-5 border-r-8 border-lp3i-emerald-100 order-1 md:order-2">
                    <div class="text-center space-y-1">
                        <h2 class="uppercase font-bold text-2xl">
                            <span class="border-l-4 border-sky-500 pl-2">Program Studi</span>
                        </h2>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Totam,
                            possimus?</p>
                    </div>
                    <img src="{{ asset('images/illustration/model.png') }}" alt="Computer Engineer"
                        class="text-center w-96 drop-shadow-lg">
                </div>
            </div>
        </section>
    @endif
    @if (count($documentations) > 0)
        <section>
            <div class="container mx-auto px-8 py-10 space-y-8">
                <div class="text-center space-y-1">
                    <h2 class="font-bold text-2xl">Siap Jadi Bagian dari Kami?</h2>
                </div>
                <div class="owl-carousel carousel-two owl-theme">
                    @foreach ($documentations as $no => $documentation)
                        <div class="item">
                            <img src="{{ asset($documentation->image) }}"
                                alt="Documentation {{ $no + 1 }}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section class="py-10 px-8">
        <div class="max-w-7xl mx-auto space-y-5 text-center">
            <div>
                <h2 class="text-2xl font-bold">PROMO PENDAFTARAN!!</h2>
                <p class="text-gray-700">Daftar sekarang, kuota terbatas! Amankan tempat Anda untuk kesempatan berharga ini sebelum habis!</p>
            </div>
            <div class="space-y-2 text-2xl">
                <h3><span class="font-bold text-red-600">Bebas Biaya</span> Pengembangan Institusi sebesar Rp. 2.500.000</h3>
                <h3><span class="font-bold text-red-600">Voucher</span> Free 1 Tiket Nonton di Bioskop XXI 07 - 31 Januari 2025</h3>
            </div>
            <div class="space-y-3">
                <a href="#" class="inline-block space-x-1 bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2.5 transition-all ease-in-out drop-shadow border-b-4 border-emerald-600">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>Daftar Sekarang</span>
                </a>
                <p class="text-sm text-red-600">*Bagi yang registrasi 07 - 31 Januari 2025, *Kuota Terbatas!</p>
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
