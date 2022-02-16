<x-app-layout>

    @livewire('ressources-search')

    <x-ressources.filter />

    @livewire('ressources-loader')

    <script src="{{ asset('js/catalogue.js') }}" defer></script>
    
</x-app-layout>