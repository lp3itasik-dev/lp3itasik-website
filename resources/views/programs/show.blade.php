<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-col md:flex-row items-center md:justify-between gap-3">
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
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">
                                {{ $program->level }}
                                {{ $program->title }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
            <span class="bg-gray-100 font-medium px-4 py-2 text-sm rounded-xl">{{ $total }}</span>
        </div>

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

            <section class="flex flex-col md:flex-row items-center justify-between md:items-end gap-4 md:gap-0">
                <a href="{{ route('programinterests.create', $program->id) }}"
                    class="flex items-center gap-2 bg-sky-500 hover:bg-sky-600 text-white px-4 py-2.5 rounded-xl transition-all ease-in-out">
                    <i class="fa-solid fa-circle-plus"></i>
                    <span class="text-sm font-bold">Tambah data</span>
                </a>
                <form method="GET" action="{{ route('programs.show', $program->id) }}"
                    class="w-full md:w-1/3 flex items-center ms-auto px-5 md:px-0">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa-solid fa-barcode text-gray-400"></i>
                        </div>
                        <input type="text" name="search"
                            class="bg-white border border-gray-200 text-gray-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="Cari konsentrasi disini..." />
                        <button type="submit" class="absolute inset-y-0 end-0 flex items-center pe-3">
                            <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                        </button>
                    </div>
                </form>
            </section>

            <div class="bg-white overflow-hidden border border-gray-200 md:rounded-2xl">
                <div class="p-6 text-gray-900 space-y-5">
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No.
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-nowrap">
                                        Nama Konsentrasi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($interests as $no => $interest)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $no + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $interest->name }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-2">
                                            <form action="{{ route('programinterests.updatestatus', $interest->id) }}"
                                                method="POST" onclick="return confirmUpdate();">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="{{ $interest->status ? 'bg-emerald-500 hover:bg-emerald-600' : 'bg-red-500 hover:bg-red-600' }} px-4 py-1.5 text-sm font-medium rounded-xl text-white transition-all ease-in-out">
                                                    {!! $interest->status ? '<i class="fa-solid fa-toggle-on"></i>' : '<i class="fa-solid fa-toggle-off"></i>' !!}
                                                </button>
                                            </form>
                                            <a href="{{ route('programinterests.edit', $interest->id) }}"
                                                class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 text-xs rounded-xl hover font-medium">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('programinterests.destroy', ['id' => $interest->id, 'program_id' => $interest->program_id]) }}" method="POST"
                                                class="inline" onclick="return confirmDelete();">
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
                                            <td colspan="3" class="px-6 py-4 text-center border-b">
                                                Data tidak ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $interests->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        function confirmUpdate(){
            return confirm('Are you sure you want to update this data?');
        }
        function confirmDelete(){
            return confirm('Are you sure you want to delete this data?');
        }
    </script>
@endpush
</x-app-layout>