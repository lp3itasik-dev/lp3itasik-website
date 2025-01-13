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
                    <form method="POST" action="{{ route('programs.update', $program->id) }}"
                        enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PATCH')
                        <div class="grid gap-5 mb-4 grid-cols-1 md:grid-cols-3">
                            <div>
                                <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Kode
                                    Jurusan</label>
                                <input type="text" name="code" id="code" value="{{ $program->code }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Kode Jurusan" required />
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('code') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Jurusan</label>
                                <input type="text" name="title" id="title" value="{{ $program->title }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Nama Jurusan" required />
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('title') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="level"
                                    class="block mb-2 text-sm font-medium text-gray-900">Jenjang</label>
                                <select id="level" name="level"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="{{ $program->level }}">{{ $program->level }}</option>
                                    <option value="S1">S1</option>
                                    <option value="D4">D4</option>
                                    <option value="D3">D3</option>
                                    <option value="Vokasi 2 Tahun">Vokasi 2 Tahun</option>
                                </select>
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('level') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="campus"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kampus</label>
                                <select id="campus" name="campus"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="{{ $program->campus }}">{{ $program->campus }}</option>
                                    <option value="Kampus Tasikmalaya">Kampus Tasikmalaya</option>
                                    <option value="Kampus Utama">Kampus Utama</option>
                                    <option value="LP3I Tasikmalaya">LP3I Tasikmalaya</option>
                                </select>
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('campus') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Tipe</label>
                                <select id="type" name="type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="" disabled {{ empty($program->type) ? 'selected' : '' }}>Pilih
                                        Tipe</option>
                                    <option value="R" {{ $program->type === 'R' ? 'selected' : '' }}>Reguler
                                    </option>
                                    <option value="N" {{ $program->type === 'N' ? 'selected' : '' }}>Non-Reguler
                                    </option>
                                    <option value="RPL" {{ $program->type === 'RPL' ? 'selected' : '' }}>Rekognisi
                                        Pembelajaran Lampau</option>
                                </select>
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('tipe') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Cover</label>
                                <input type="file" name="image" id="image"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('image') }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="vision"
                                    class="block mb-2 text-sm font-medium text-gray-900">Visi</label>
                                <textarea name="vision" id="vision" value="{{ $program->vision }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Visi">{{ $program->vision }}</textarea>
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('vision') }}</span>
                                </p>
                            </div>
                            <div>
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                <textarea name="description" id="description" value="{{ $program->description }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Deskripsi">{{ $program->description }}</textarea>
                                <p class="mt-1 text-xs text-gray-500">
                                    <span class="text-red-500 text-xs">{{ $errors->first('description') }}</span>
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
