<x-app-layout>
    <x-page-header heading="{{ trans_choice('titles.moderation.pending', 2) }}" />
    <x-triptyque>
        @foreach ($ressources as $ressource)
            @if ($ressource->status == App\Enums\RessourceStatus::Pending->value)
                <x-ressource-preview :ressource="$ressource" /> 
            @endif
        @endforeach
    </x-triptyque>
</x-app-layout>