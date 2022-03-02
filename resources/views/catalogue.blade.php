<x-app-layout>

    @livewire('ressources-search')

    <x-ressources.filter />

    <x-triptyque>
        <x-slot name="left">
            <x-catalogue-filter />
        </x-slot>

        @livewire('ressources-loader')

        <x-slot name="right">
            <x-sidebar-section>
                <x-profile-menu />
            </x-sidebar-section>
        </x-slot>
    </x-triptyque>

    <script src="{{ asset('js/catalogue.js') }}" defer></script>
    
</x-app-layout>