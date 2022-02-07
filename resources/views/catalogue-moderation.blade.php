<x-app-layout>

    <p>{{ __('titles.moderation.pendings') }}</p>

    @auth
        @can('publish-ressources')
            @foreach ($ressources as $ressource)
                @if ($ressource->status === 'pending')
                    <x-ressource-preview :ressource="$ressource" />
                @endif
            @endforeach
        @endcan
    @endauth

</x-app-layout>