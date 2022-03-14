<x-app-layout>
    <x-page-header heading="{{ trans_choice('titles.section.role', 2) }}" />
    <x-triptyque>
        @foreach ($roles as $role)
            <h2>{{ $role->name }}</h2>
        @endforeach
    </x-triptyque>
</x-app-layout>