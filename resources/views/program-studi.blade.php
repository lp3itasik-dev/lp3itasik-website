<x-website-layout>
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
                    @if (count($program->programInterests) > 0)
                        <h3 class="bg-gray-100 px-5 py-2 text-sm border-l-8 border-gray-400 text-gray-700 font-medium">
                            Konsentrasi:</h3>
                        <ul class="space-y-1">
                            @foreach ($program->programInterests as $interest)
                                <li class="space-x-1 text-md text-gray-600">
                                    <i class="fa-regular fa-circle-dot text-sm text-lp3i-100"></i>
                                    <span>{{ $interest->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if (count($program->programPotentions) > 0)
                        <h3 class="bg-gray-100 px-5 py-2 text-sm border-l-8 border-gray-400 text-gray-700 font-medium">
                            Potensi Karir:</h3>
                        <ul class="flex flex-wrap gap-4">
                            @foreach ($program->programPotentions as $potention)
                                <li class="text-md text-gray-600 underline underline-offset-4 decoration-emerald-300">
                                    <span>{{ $potention->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="flex items-center justify-center md:justify-end">
                <img src="{{ asset('images/cover-employee.png') }}" alt="Hero" class="w-96" />
            </div>
        </div>
    </header>
    <section
        class="bg-gradient-to-r from-lp3i-500 via-lp3i-200 to-lp3i-400 border-t-8 border-lp3i-emerald-100 drop-shadow-lg py-10">
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
        <div class="container mx-auto px-8 py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-5">
                    <div>
                        <div class="space-y-1 mb-2">
                            <h4 class="font-medium text-sky-700">#mengenalLP3I</h4>
                            <h2 class="font-bold text-2xl">Visi</h2>
                        </div>
                        <p class="text-sm text-gray-600 text-justify">{{ $program->vision ?? 'Belum ada visi' }}</p>
                    </div>
                    @if (count($program->programMissions) > 0)
                        <div class="space-y-2">
                            <h2 class="font-bold text-2xl">Misi</h2>
                            <ul class="text-sm text-gray-600 space-y-2 list-decimal ml-3">
                                @foreach ($program->programMissions as $mission)
                                    <li>
                                        <span>{{ $mission->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            </ul>
                        </div>
                    @endif
                    @if (count($program->programBenefits) > 0)
                        <div class="space-y-2">
                            <h2 class="font-bold text-2xl">Keunggulan</h2>
                            <ul class="text-sm text-gray-600 space-y-2 list-decimal ml-3">
                                @foreach ($program->programBenefits as $benefit)
                                    <li>
                                        <span>{{ $benefit->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            </ul>
                        </div>
                    @endif
                    @if (count($program->programCompetentions) > 0)
                        <div class="space-y-2">
                            <h2 class="font-bold text-2xl">Standar Kompetensi</h2>
                            <ul class="text-sm text-gray-600 space-y-2 list-decimal ml-3">
                                @foreach ($program->programCompetentions as $competention)
                                    <li>
                                        <span>{{ $competention->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="space-y-8">
                    @if (count($program->programAlumnis) > 0)
                        <div>
                            <div class="space-y-1 mb-2">
                                <h4 class="font-medium text-sky-700">#mengenalLP3I</h4>
                                <h2 class="font-bold text-2xl">Testimoni Alumni & Mahasiswa</h2>
                            </div>
                            <p class="text-sm text-gray-600 text-justify">Lorem, ipsum dolor sit amet consectetur
                                adipisicing elit. Aperiam, nesciunt.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            @foreach ($program->programAlumnis as $alumni)
                                <div class="bg-white p-5 rounded-lg space-y-3 border-b-8 border-lp3i-200 shadow-lg">
                                    <div class="mx-auto flex justify-center">
                                        <img src="{{ asset('images/user.png') }}" alt=""
                                            class="w-10 h-10 rounded-full">
                                    </div>
                                    <h2 class="text-center font-bold text-xl text-gray-900">{{ $alumni->name }}</h2>
                                    <hr>
                                    <ul class="text-sm text-center">
                                        <li>
                                            <span class="text-gray-700">Asal Sekolah</span>
                                            <span class="font-medium text-gray-800">{{ $alumni->school }}</span>
                                        </li>
                                        <li>
                                            <span class="text-gray-700">Bekerja</span>
                                            <span class="font-medium text-gray-800">{{ $alumni->work }}</span>
                                        </li>
                                        <li>
                                            <span class="text-gray-700">Sebagai</span>
                                            <span class="font-medium text-gray-800">{{ $alumni->profession }}</span>
                                        </li>
                                    </ul>
                                    <hr>
                                    <p class="text-sm text-center italic">"{{ $alumni->quote }}"</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto px-8 py-10 space-y-4 border-t-8 border-lp3i-emerald-200">
            <div class="text-center">
                <h2 class="text-2xl font-bold">PROMO PENDAFTARAN!!</h2>
                <p class="text-gray-700">Daftar sekarang, kuota terbatas! Amankan tempat Anda untuk kesempatan berharga
                    ini sebelum habis!</p>
            </div>
            <div class="space-y-2 text-2xl text-center">
                <h3><span class="font-bold text-red-600">Bebas Biaya</span> Pengembangan Institusi sebesar Rp.
                    2.500.000</h3>
                <h3><span class="font-bold text-red-600">Voucher</span> Free 1 Tiket Nonton di Bioskop XXI 25 - 31
                    Desember 2024</h3>
            </div>
            <div class="space-y-3 text-center">
                <a href="#"
                    class="inline-block space-x-1 bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2.5 transition-all ease-in-out drop-shadow border-b-4 border-emerald-600">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>Daftar Sekarang</span>
                </a>
                <p class="text-sm text-red-600">*Bagi yang registrasi 25 - 31 Desember 2024, *Kuota Terbatas!</p>
            </div>
        </div>
    </section>
    <hr>
    <section>
        <div class="container mx-auto px-8 py-10 space-y-8">
            <div class="text-center space-y-1">
                <h2 class="font-bold text-2xl">Siap Jadi Bagian dari Kami?</h2>
                <p class="text-sm text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit,
                    maxime.</p>
            </div>
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
</x-website-layout>
