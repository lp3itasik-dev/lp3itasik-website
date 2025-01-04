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
        </div>

    </x-slot>

    <div class="py-5 space-y-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <ul class="list-disc list-inside space-y-3 ml-5">
                <li class="text-gray-700">
                    <a href="{{ route('programinterests.show', $program->id) }}" class="underline underline-offset-2">Interests</a>
                </li>
                <li class="text-gray-700">
                    <a href="{{ route('programpotentions.show', $program->id) }}" class="underline underline-offset-2">Potentions</a>
                </li>
                <li class="text-gray-700">
                    <a href="{{ route('programmissions.show', $program->id) }}" class="underline underline-offset-2">Missions</a>
                </li>
                <li class="text-gray-700">
                    <a href="{{ route('programbenefits.show', $program->id) }}" class="underline underline-offset-2">Benefits</a>
                </li>
                <li class="text-gray-700">
                    <a href="{{ route('programcompetentions.show', $program->id) }}" class="underline underline-offset-2">Competentions</a>
                </li>
            </ul>
        </div>
    </div>
    @push('scripts')
        <script>
            function confirmUpdate() {
                return confirm('Are you sure you want to update this data?');
            }

            function confirmDelete() {
                return confirm('Are you sure you want to delete this data?');
            }
        </script>
    @endpush
</x-app-layout>
