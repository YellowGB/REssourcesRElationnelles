<x-app-layout>

    <p>{{ __('titles.moderation.pendings') }}</p>

    @foreach ($ressources as $ressource)
        @if ($ressource->status == App\Enums\RessourceStatus::Pending->value)
            <x-ressource-preview :ressource="$ressource" /> 
        @endif
    @endforeach

</x-app-layout>