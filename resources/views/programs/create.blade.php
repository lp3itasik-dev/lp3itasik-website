<x-app-layout>
    <x-slot name="header">


        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('programs.index') }}"
                        class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-gray-800 transition-all ease-in-out">
                        <i class="fa-solid fa-book"></i>
                        <span>Programs</span>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-angle-right text-gray-300"></i>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Create</span>
                    </div>
                </li>
            </ol>
        </nav>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('alert-type') == 'success')
                <div id="alert" class="flex items-center p-4 text-emerald-50 rounded-xl bg-emerald-500"
                    role="alert">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('message') }}
                    </div>
                    <button type="button" onclick="document.getElementById('alert').style.display = 'none';"
                        class="text-emerald-50 hover:text-emerald-100 transition-all ease-in-out ms-auto">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
