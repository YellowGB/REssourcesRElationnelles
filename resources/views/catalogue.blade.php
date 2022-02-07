<x-app-layout>

    @can('publish-ressources')
        <form action="{{ route('catalogue.moderation', $manage = 'true') }}">
            <input type="submit" value="{{ __('titles.moderation.ressource') }}">
        </form>
    @endcan

    @guest 
        @foreach ($ressources as $ressource)
            @if ($ressource->restriction === 'public')
                <x-ressource-preview :ressource="$ressource" />
            @endif
        @endforeach
    @endguest
    @auth
        @can('access-admin')
            @foreach ($ressources as $ressource)
                <x-ressource-preview :ressource="$ressource" />
            @endforeach
        @else
            @foreach ($ressources as $ressource)
                @if ($ressource->user_id === Auth::user()->id || $ressource->restriction === 'public')
                    <x-ressource-preview :ressource="$ressource" />
                @endif
            @endforeach
        @endcan
    @endauth

</x-app-layout>