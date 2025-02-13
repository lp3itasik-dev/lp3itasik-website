<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <a href="{{ route('links.index') }}"
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Links') }}
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
                <a href="{{ route('links.create') }}"
                    class="flex items-center gap-2 bg-sky-500 hover:bg-sky-600 text-white px-4 py-2.5 rounded-xl transition-all ease-in-out">
                    <i class="fa-solid fa-circle-plus"></i>
                    <span class="text-sm font-bold">Tambah data</span>
                </a>
                <form method="GET" action="{{ route('links.index') }}"
                    class="w-full md:w-1/3 flex items-center ms-auto px-5 md:px-0">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa-solid fa-barcode text-gray-400"></i>
                        </div>
                        <input type="text" name="search"
                            class="bg-white border border-gray-200 text-gray-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="Cari nama kegiatan disini..." />
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
                                        Code
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Link Target
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        View
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($links as $no => $link)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $no + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            /in/<span class="underline font-medium underline-offset-2">{{ $link->code }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $link->name }}
                                        </td>
                                        <td class="px-6 py-4 text-wrap">
                                            {{ $link->url }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $link->view }}
                                        </td>
                                        <td class="px-6 py-4 flex flex-col md:flex-row items-center gap-2">
                                            <button type="button"
                                                onclick="copyToClipboard('{{ $link->code }}', '{{ config('app.url') }}')"
                                                class="inline-block bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 text-xs rounded-xl hover font-medium">
                                                <i class="fa-solid fa-link"></i>
                                            </button>
                                            <a href="{{ route('links.edit', $link->id) }}"
                                                class="inline-block bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 text-xs rounded-xl hover font-medium">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('links.destroy', $link->id) }}" method="POST"
                                                class="inline-block" onclick="return confirmDelete();">
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
                        {{ $links->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function copyToClipboard(code, url) {
                const clipboard = `${url}/in/${code}`;
                navigator.clipboard.writeText(clipboard);
                alert('Link berhasil disalin!');
            }

            function confirmUpdate() {
                return confirm('Are you sure you want to update this data?');
            }

            function confirmDelete() {
                return confirm('Are you sure you want to delete this data?');
            }
        </script>
    @endpush
</x-app-layout>
