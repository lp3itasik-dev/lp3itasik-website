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
                <li>
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-angle-right text-gray-300"></i>
                        <a href="{{ route('programs.show', $program->id) }}" class="ms-1 text-sm font-medium text-gray-500 hover:text-gray-600">Program Potentions</a>
                    </div>
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
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-4">
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
                    <form method="POST" action="{{ route('programpotentions.store') }}">
                        @csrf
                        <input type="hidden" name="program_id" id="program_id" value="{{ $program->id }}">
                        <div class="grid gap-5 mb-4 md:grid-cols-2">
                            <div>
                                <label for="program_id" class="block mb-2 text-sm font-medium text-gray-900">
                                    Program Studi
                                </label>
                                <input type="text" value="{{ $program->level }} {{ $program->title }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Program Studi" disabled />
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('program_id') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Potensi</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Nama Potensi" required />
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('name') }}</span>
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
