<x-app-layout>

    @livewire('ressources-search')

    @auth
        @can('publish-ressources')
            <form action="{{ route('comments.moderation') }}">
                <input type="submit" value="Moderer les commentaires" />
            </form>
        @endcan
    @endauth

    @livewire('ressources-loader')

</x-app-layout>