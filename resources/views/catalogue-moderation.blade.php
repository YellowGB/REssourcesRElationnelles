<x-app-layout>

    <p>{{ __('titles.moderation.pendings') }}</p>

    @foreach ($ressources as $ressource)
        <x-ressource-preview :ressource="$ressource" />
    @endforeach

</x-app-layout>