<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <a href="{{ route('programs.index') }}" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Programs') }}
            </a>
            <span class="bg-gray-100 font-medium px-4 py-2 text-sm rounded-xl">{{ $total }}</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('alert-type') == 'success')
                <div id="alert" class="flex items-center p-4 text-emerald-50 rounded-xl bg-emerald-500" role="alert">
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

            <section class="flex flex-col md:flex-row items-center justify-between md:items-end gap-4 md:gap-0">
                <a href="{{ route('programs.create') }}"
                    class="flex items-center gap-2 bg-sky-500 hover:bg-sky-600 text-white px-4 py-2.5 rounded-xl transition-all ease-in-out">
                    <i class="fa-solid fa-circle-plus"></i>
                    <span class="text-sm font-bold">Tambah data</span>
                </a>
                <form method="GET" action="{{ route('programs.index') }}"
                    class="w-full md:w-1/3 flex items-center ms-auto px-5 md:px-0">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa-solid fa-barcode text-gray-400"></i>
                        </div>
                        <input type="text" name="search"
                            class="bg-white border border-gray-200 text-gray-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="Cari jurusan disini..." />
                        <button type="submit" class="absolute inset-y-0 end-0 flex items-center pe-3">
                            <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                        </button>
                    </div>
                </form>
            </section>

            <div class="bg-white overflow-hidden border border-gray-200 rounded-2xl">
                <div class="p-6 text-gray-900 space-y-5">
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No.
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kode Jurusan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jurusan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kampus
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipe
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($programs as $no => $program)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $no + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $program->code }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $program->level }}
                                            {{ $program->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $program->campus }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @switch($program->type)
                                                @case('R')
                                                    Reguler
                                                @break

                                                @case('N')
                                                    Non Reguler
                                                @break

                                                @case('RPL')
                                                    Rekognisi Pembelajaran Lampau
                                                @break

                                                @default
                                                    Tidak terdefinisi
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="px-6 py-4 flex gap-2">
                                            <form action="{{ route('programs.updatestatus', $program->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="{{ $program->status ? 'bg-emerald-500 hover:bg-emerald-600' : 'bg-red-500 hover:bg-red-600' }} px-4 py-1.5 text-sm font-medium rounded-xl text-white transition-all ease-in-out">
                                                    {!! $program->status ? '<i class="fa-solid fa-toggle-on"></i>' : '<i class="fa-solid fa-toggle-off"></i>' !!}
                                                </button>
                                            </form>
                                            <a href="{{ route('programs.edit', $program->id) }}"
                                                class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 text-xs rounded-xl hover font-medium">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('programs.destroy', $program->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-xs rounded-xl hover font-medium">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-4 text-center border-b">
                                                Data tidak ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $programs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
