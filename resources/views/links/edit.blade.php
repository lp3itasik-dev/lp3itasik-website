<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('links.index') }}"
                        class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-gray-800 transition-all ease-in-out">
                        <i class="fa-solid fa-link"></i>
                        <span>Links</span>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-angle-right text-gray-300"></i>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Edit</span>
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

            @if (session('alert-type') == 'failed')
                <div id="alert" class="flex items-center p-4 text-emerald-50 rounded-xl bg-red-500" role="alert">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('message') }}
                    </div>
                    <button type="button" onclick="document.getElementById('alert').style.display = 'none';"
                        class="text-red-50 hover:text-emerald-100 transition-all ease-in-out ms-auto">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>
            @endif

            <div class="bg-white overflow-hidden border border-gray-200 md:rounded-2xl">
                <div class="p-6 text-gray-900 space-y-5">
                    <form method="POST" action="{{ route('links.update', $link->id) }}"
                        enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PATCH')
                        <div class="grid gap-5 mb-4 md:grid-cols-3">
                            <div>
                                <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Code</label>
                                <input type="text" name="code" id="code" value="{{ $link->code }}" placeholder="Contoh: /in/...... | Isi titik-titik saja."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('code') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                <input type="text" name="name" id="name" value="{{ $link->name }}" placeholder="Tuliskan nama situs disini..."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('name') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="url" class="block mb-2 text-sm font-medium text-gray-900">URL</label>
                                <input type="text" name="url" id="url" value="{{ $link->url }}" placeholder="Tuliskan url situs disini..."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('url') }}</span>
                                </p>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm w-full sm:w-auto px-5 py-2.5 text-center space-x-1">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Simpan</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
