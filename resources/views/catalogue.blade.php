<x-app-layout>

    @livewire('ressources-search')

    <x-ressources.filter />

    <x-sidebar-catalogue>
        @livewire('ressources-loader')
    </x-sidebar-catalogue>

    <script src="{{ asset('js/catalogue.js') }}" defer></script>
    
</x-app-layout>