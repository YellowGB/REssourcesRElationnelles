<x-app-layout>

    @livewire('ressources-search')

    <x-ressources.filter />

    <x-triptyque>
        <x-slot name="left">
            <x-catalogue-filter />
        </x-slot>

        @livewire('ressources-loader')

    </x-triptyque>

    <script src="{{ asset('js/catalogue.js') }}" defer></script>
    
</x-app-layout>