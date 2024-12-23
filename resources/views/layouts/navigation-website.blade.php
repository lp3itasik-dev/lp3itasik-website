<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="container mx-auto p-5">
        <div class="flex justify-between h-16">
            <div class="w-full flex justify-between">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo/logo-lp3i.svg') }}" alt="" class="h-14">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="relative hidden space-x-8 sm:-my-px sm:ms-10 sm:flex sm:items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Tentang Kampus') }}
                    </x-nav-link>
                    <div class="relative flex items-center" x-data="{ open: false }" @click.outside="open = false"
                        @close.stop="open = false">
                        <div @click="open = ! open"
                            class="text-sm text-gray-500 hover:text-gray-700 cursor-pointer space-x-1 transition-all ease-in-out">
                            <span class="font-medium">Program Studi</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute z-50 top-10 rounded-2xl shadow-xl
                                style="display:
                            none;" @click="open = false">
                            <div class="w-[300px] relative top-0 rounded-md ">
                                <div class="w-full bg-gray-50 p-4 rounded-2xl">
                                    <dl class="space-y-3 text-sm">
                                        @if (count($programs_plt) > 0)
                                            <dt class="font-bold bg-sky-100 px-3 py-1.5 rounded-xl text-sky-700">
                                                Politeknik LP3I Kampus Tasikmalaya</dt>
                                            <hr>
                                            @foreach ($programs_plt as $program)
                                                <dd>
                                                    <a href="#"
                                                        class="space-x-1 text-gray-500 hover:text-gray-700 transition-all ease-in-out">
                                                        <i class="fa-solid fa-circle text-xs"></i>
                                                        <span class="font-medium">
                                                            {{ $program->level }}
                                                            {{ $program->title }}
                                                        </span>
                                                    </a>
                                                </dd>
                                            @endforeach
                                        @endif
                                        @if (count($programs_plt_vokasi) > 0)
                                            <dt
                                                class="font-bold bg-emerald-100 px-3 py-1.5 rounded-xl text-emerald-700">
                                                LP3I Tasikmalaya</dt>
                                            <hr>
                                            @foreach ($programs_plt_vokasi as $program)
                                                <dd>
                                                    <a href="#"
                                                        class="space-x-1 text-gray-500 hover:text-gray-700 transition-all ease-in-out">
                                                        <i class="fa-solid fa-circle text-xs"></i>
                                                        <span class="font-medium">
                                                            {{ $program->level }}
                                                            {{ $program->title }}
                                                        </span>
                                                    </a>
                                                </dd>
                                            @endforeach
                                        @endif
                                        @if (count($programs_plb) > 0)
                                            <dt class="font-bold bg-amber-100 px-3 py-1.5 rounded-xl text-amber-700">
                                                Kampus Utama</dt>
                                            <hr>
                                            @foreach ($programs_plb as $program)
                                                <dd>
                                                    <a href="#"
                                                        class="space-x-1 text-gray-500 hover:text-gray-700 transition-all ease-in-out">
                                                        <i class="fa-solid fa-circle text-xs"></i>
                                                        <span class="font-medium">
                                                            {{ $program->level }}
                                                            {{ $program->title }}
                                                        </span>
                                                    </a>
                                                </dd>
                                            @endforeach
                                        @endif
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Organisasi Mahasiswa') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Pusat Karir') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Reguler Sore') }}
                    </x-nav-link>
                    <a href="#"
                        class="inline-flex items-center bg-lp3i-200 hover:bg-lp3i-300 transition-all ease-in-out py-3 px-5 text-sm text-center font-bold text-white rounded-2xl">Daftar
                        Sekarang!</a>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-5 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Tentang Kampus') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Program Studi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Organisasi Mahasiswa') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Pusat Karir') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Reguler Sore') }}
            </x-responsive-nav-link>
        </div>

        <div class="mb-5 px-4">
            <a href="#"
                class="block bg-lp3i-200 hover:bg-lp3i-300 transition-all ease-in-out py-3 px-4 text-center font-bold text-white rounded-2xl">Daftar
                Sekarang!</a>
        </div>
    </div>
</nav>
