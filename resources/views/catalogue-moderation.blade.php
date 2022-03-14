<x-app-layout>
    <x-page-header heading="{{ __('titles.moderation.pendings') }}" />
    <x-triptyque>
        @foreach ($ressources as $ressource)
            @if ($ressource->status == App\Enums\RessourceStatus::Pending->value)
                <x-ressource-preview :ressource="$ressource" /> 
            @endif
        @endforeach
    </x-triptyque>
</x-app-layout>