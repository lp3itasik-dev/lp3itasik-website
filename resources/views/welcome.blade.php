<x-website-layout>
    @push('components')
        @include('components.popup-reguler')
    @endpush
    <header class="owl-carousel carousel-one owl-theme">
        @forelse ($banners as $no => $banner)
            <img src="{{ asset($banner->image) }}" alt="banner-{{ $no + 1 }}" class="item aspect-video">
        @empty
            <img src="{{ asset('images/doc-kk/KK-1.jpeg') }}" alt="banner-default" class="item aspect-video">
        @endforelse
    </header>
    <section>
        <div class="container mx-auto p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-10 justify-center text-center text-sm">
                <a href="#"
                    class="flex items-center justify-center gap-3 bg-red-500 hover:bg-red-600 transition-all ease-in-out px-4 py-3 border-l-8 border-lp3i-red-100 text-white font-medium space-x-1 rounded-xl">
                    <span>Informasi Pendaftaran</span>
                    <i class="fa-solid fa-external-link"></i>
                </a>
                <a href="{{ route('career-center') }}"
                    class="flex items-center justify-center gap-3 bg-gray-200 hover:bg-gray-300 transition-all ease-in-out px-4 py-3 border-l-8 border-lp3i-emerald-100 text-gray-900 font-medium rounded-xl">
                    <span>Pusat Karir</span>
                    <i class="fa-solid fa-external-link"></i>
                </a>
                <a href="https://virtualkampus.politekniklp3i-tasikmalaya.ac.id" target="_blank"
                    class="flex items-center justify-center gap-3 bg-gray-200 hover:bg-gray-300 transition-all ease-in-out px-4 py-3 border-l-8 border-lp3i-100 text-gray-900 font-medium space-x-1 rounded-xl">
                    <span>Virtual Kampus</span>
                    <i class="fa-solid fa-external-link"></i>
                </a>
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto px-8 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div
                    class="text-center bg-gray-50 hover:bg-gray-100 border-b-4 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out drop-shadow-lg rounded-2xl">
                    <i class="fa-solid fa-certificate text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Terakreditasi BAN-PT</h2>
                    <p class="text-sm text-gray-600">Politeknik LP3I Kampus Tasikmalaya telah terakreditasi BAN-PT
                        dengan peringkat B</p>
                </div>
                <div
                    class="text-center bg-gray-50 hover:bg-gray-100 border-b-4 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out drop-shadow-lg rounded-2xl">
                    <i class="fa-solid fa-graduation-cap text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Kurikulum Berbasis Link & Match</h2>
                    <p class="text-sm text-gray-600">Memiliki kerjasama dengan perusahaan serta memiliki kurikulum yang
                        sesuai dengan kebutuhan dunia kerja. Dengan pola perkuliahan 70% praktikum dan 30% teori</p>
                </div>
                <div
                    class="text-center bg-gray-50 hover:bg-gray-100 border-b-4 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out drop-shadow-lg rounded-2xl">
                    <i class="fa-solid fa-medal text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Sertifikasi Kompetensi</h2>
                    <p class="text-sm text-gray-600">Mahasiswa Politeknik LP3I memiliki 4 sertifikasi kompetensi dari
                        Badan Nasional Sertifikasi Profesi (BNSP) dan International Test Center</p>
                </div>
                <div
                    class="text-center bg-gray-50 hover:bg-gray-100 border-b-4 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out drop-shadow-lg rounded-2xl">
                    <i class="fa-solid fa-chalkboard-user text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Dosen Profesional dan Praktisi</h2>
                    <p class="text-sm text-gray-600">Dosen Politeknik LP3I memiliki sertifikasi dosen dari Kemendikbud
                        dan Dosen praktisi yang berpengalaman di bidang industri</p>
                </div>
                <div
                    class="text-center bg-gray-50 hover:bg-gray-100 border-b-4 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out drop-shadow-lg rounded-2xl">
                    <i class="fa-solid fa-briefcase text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Penempatan Magang dan Kerja</h2>
                    <p class="text-sm text-gray-600">Mahasiswa mengikuti proses kuliah kerja industri dan penempatan
                        kerja di industri dan dunia kerja</p>
                </div>
                <div
                    class="text-center bg-gray-50 hover:bg-gray-100 border-b-4 border-lp3i-emerald-200 p-4 space-y-1 transition-all ease-in-out drop-shadow-lg rounded-2xl">
                    <i class="fa-regular fa-lightbulb text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Memiliki Hardskill dan Softskill</h2>
                    <p class="text-sm text-gray-600">Mendapatkan pembekalan hardskill dan softskill untuk dunia kerja
                    </p>
                </div>
            </div>
        </div>
    </section>
    <hr class="my-10">
    <section>
        <div class="container mx-auto px-8 pb-8 space-y-5">
            <div class="text-center space-y-1">
                <h2 class="font-bold text-xl text-gray-900">Informasi Penerimaan Mahasiswa Baru</h2>
                <p class="text-sm text-gray-700">Politeknik LP3I Kampus Tasikmalaya juga menerima mahasiswa.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div
                    class="text-center bg-white hover:bg-gray-50 border-b-4 border-gray-300/40 p-4 space-y-1 transition-all ease-in-out">
                    <i class="fa-solid fa-right-left text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Transfer Kredit</h2>
                    <p class="text-sm text-gray-600">Kembangkan potensimu di LP3I dengan mudah! Transfer kredit dari
                        perguruan tinggi lain, raih kesuksesan kariermu bersama kami.</p>
                </div>
                <div
                    class="text-center bg-white hover:bg-gray-50 border-b-4 border-gray-300/40 p-4 space-y-1 transition-all ease-in-out">
                    <i class="fa-solid fa-wheelchair text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Disabilitas</h2>
                    <p class="text-sm text-gray-600">Jembatani impian dengan inklusi. Kami menyambut mahasiswa
                        disabilitas untuk meraih pendidikan berkualitas dengan dukungan dan inspirasi penuh.</p>
                </div>
                <div
                    class="text-center bg-white hover:bg-gray-50 border-b-4 border-gray-300/40 p-4 space-y-1 transition-all ease-in-out">
                    <i class="fa-solid fa-building-columns text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Mahasiswa Pindahan</h2>
                    <p class="text-sm text-gray-600">Langkah baru, peluang tak terbatas. Bergabunglah sebagai mahasiswa
                        pindahan, wujudkan prestasimu di lingkungan inspiratif kami.</p>
                </div>
                <div
                    class="text-center bg-white hover:bg-gray-50 border-b-4 border-gray-300/40 p-4 space-y-1 transition-all ease-in-out">
                    <i class="fa-solid fa-earth-asia text-lg bg-sky-200 text-sky-700 p-3 rounded-full"></i>
                    <h2 class="font-bold text-xl">Warga Negara Asing</h2>
                    <p class="text-sm text-gray-600">Global dreams start here! Join us, international students, for
                        world-class education, cultural diversity, and boundless opportunities.</p>
                </div>
            </div>
        </div>
    </section>
    <section
        class="bg-gradient-to-r from-lp3i-500 via-lp3i-200 to-lp3i-400 border-t-8 border-lp3i-emerald-100 drop-shadow-lg">
        <div class="container mx-auto px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-10">
                <div>
                    <iframe class="w-full border-r-8 border-lp3i-red-100 drop-shadow-lg" height="315"
                        src="https://www.youtube.com/embed/65tKWbwQZ5M?si=zz8V5DylU13jHw2v" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="space-y-5">
                    <div class="space-y-1">
                        <h2 class="text-2xl font-bold text-white">Program Perkuliahan</h2>
                        <p class="text-white">Berikut adalah program perkuliahan yang tersedia di Politeknik LP3I Kampus
                            Tasikmalaya, yang dirancang untuk mendukung berbagai kegiatan akademik dan non-akademik
                            mahasiswa.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <h2 class="bg-sky-100 border-l-8 border-sky-400 px-5 py-2 font-medium text-sky-900">
                                <i class="fa-solid fa-cloud text-sm"></i>
                                <span>Reguler Pagi</span>
                            </h2>
                            <p class="text-sm indent-5 text-white">Jadwal kuliah yang dimulai dari hari Senin sampai
                                dengan Jum'at dari jam 08.00 WIB s.d 16.00 WIB. Aktif di organisasi membuatmu menjadi
                                lebih banyak relasi!</p>
                        </div>
                        <div class="space-y-2">
                            <h2 class="bg-amber-100 border-l-8 border-amber-400 px-5 py-2 font-medium text-amber-900">
                                <i class="fa-solid fa-moon text-sm"></i>
                                <span>Reguler Sore</span>
                            </h2>
                            <p class="text-sm indent-5 text-white">Jadwal kuliah yang dimulai dari hari Senin sampai
                                dengan Jum'at dari jam 16.00 WIB s.d 20.30 WIB. Cocok buat kamu yang ingin kuliah sambil
                                bekerja.</p>
                        </div>
                    </div>
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
                                <p class="text-gray-600">Politeknik LP3I Kampus Tasikmalaya menyediakan berbagai program
                                    pendidikan yang mendukung perkembangan keahlian dan karir mahasiswa di berbagai
                                    bidang.</p>
                            </div>
                            <ul class="space-y-3">
                                @foreach ($programs_plt as $program)
                                    <li class="border-l-8 border-lp3i-200 px-5 space-y-1">
                                        <a href="{{ route('program-studi', $program->code) }}"
                                            class="flex items-center gap-2 text-2xl font-bold hover:underline underline-offset-4">
                                            <span>{{ $program->level }} {{ $program->title }}</span>
                                        </a>
                                        <p class="text-gray-700 font-medium">{{ $program->accreditation }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <hr>
                    @endif
                    @if (count($programs_plt_vokasi) > 0)
                        <div class="space-y-4">
                            <div class="space-y-1">
                                <h2 class="font-bold text-lg">Vokasi 2 Tahun LP3I Tasikmalaya</h2>
                                <p class="text-gray-600">Program vokasi 2 tahun di LP3I Tasikmalaya dirancang untuk
                                    memberikan keterampilan praktis dan siap pakai bagi mahasiswa yang ingin langsung
                                    terjun ke dunia kerja.</p>
                            </div>
                            <ul class="space-y-3">
                                @foreach ($programs_plt_vokasi as $program)
                                    <li class="border-l-8 border-lp3i-200 px-5 space-y-1">
                                        <a href="{{ route('program-studi', $program->code) }}"
                                            class="flex items-center gap-2 text-2xl font-bold hover:underline underline-offset-4">
                                            <span>{{ $program->level }} {{ $program->title }}</span>
                                        </a>
                                        <p class="text-gray-700 font-medium">{{ $program->accreditation }}</p>
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
                                <p class="text-gray-600">Kampus utama dilengkapi dengan berbagai fasilitas modern yang
                                    mendukung pembelajaran dan kegiatan mahasiswa secara optimal.</p>
                            </div>
                            <ul class="space-y-3">
                                @foreach ($programs_plb as $program)
                                    <li class="border-l-8 border-lp3i-200 px-5 space-y-1">
                                        <a href="{{ route('program-studi', $program->code) }}"
                                            class="flex items-center gap-2 text-2xl font-bold hover:underline underline-offset-4">
                                            <span>{{ $program->level }} {{ $program->title }}</span>
                                        </a>
                                        <p class="text-gray-700 font-medium">{{ $program->accreditation }}</p>
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
                        <p class="text-sm text-gray-600 max-w-md">Berikut adalah daftar program studi yang tersedia di
                            Politeknik LP3I Kampus Tasikmalaya untuk mendukung perkembangan karir dan keahlian
                            mahasiswa.</p>
                    </div>
                    <img src="{{ asset('images/illustration/model.png') }}" alt="Computer Engineer"
                        class="text-center w-96 drop-shadow-lg">
                </div>
            </div>
        </section>
    @endif
    @if (count($documentations) > 0)
        <section>
            <div class="container mx-auto p-8">
                <div class="owl-carousel carousel-two owl-theme">
                    @foreach ($documentations as $no => $documentation)
                        <div class="item">
                            <img src="{{ asset($documentation->image) }}" alt="Documentation {{ $no + 1 }}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <hr>
    <section>
        <div class="container mx-auto p-8">
            <div class="text-center mb-10">
                <h2 class="font-bold text-2xl text-gray-900">Kerjasama</h2>
                <p class="text-base text-gray-600 max-w-2xl mx-auto">Politeknik LP3I Kampus Tasikmalaya menjalin
                    kerjasama dengan berbagai institusi untuk meningkatkan kualitas pendidikan dan memberikan peluang
                    bagi mahasiswa dalam dunia industri.</p>
            </div>
            <div class="flex flex-wrap justify-center items-center gap-5">
                <img src="{{ asset('images/companies-logo/logo-1.png') }}" alt="Logo-1" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-2.png') }}" alt="Logo-2" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-3.png') }}" alt="Logo-3" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-4.png') }}" alt="Logo-4" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-6.png') }}" alt="Logo-6" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-7.png') }}" alt="Logo-7" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-8.png') }}" alt="Logo-8" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-9.png') }}" alt="Logo-9" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-10.png') }}" alt="Logo-10" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-11.png') }}" alt="Logo-11" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-12.png') }}" alt="Logo-12" class="w-24">
                <img src="{{ asset('images/companies-logo/logo-14.png') }}" alt="Logo-14" class="w-24">
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
