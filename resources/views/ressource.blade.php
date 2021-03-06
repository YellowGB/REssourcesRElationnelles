<x-app-layout>
    <x-page-header heading="{{ $ressource->title }}" />
    <x-triptyque>
        <x-slot name="left">
            <x-sidebar-section>
                <x-ressources.detail :ressource="$ressource" :progress="$progress" />
            </x-sidebar-section>
        </x-slot>
        
        <div class="my-4 mx-4 md:mx-0">

            <x-ressources.moderation :ressource="$ressource" />

            <x-ressource-header :ressource="$ressource" />

            @if ($ressource->status === App\Enums\RessourceStatus::Pending->value)
                <i class="text-red-600 dark:text-red-600">{{ trans_choice('titles.moderation.pending', 1) }}</i>
            @endif

            <x-content-display :ressource="$ressource" :content="$content" />

            <x-ressources.footer :ressource="$ressource" :progress="$progress" />


            <x-sep-horizontal />


            {{-- Commentaires --}}
            <h2>{{ __('titles.section.comments') }}</h2>

            <x-commentaire-add :ressource="$ressource" />

            <x-commentaires.section :ressource="$ressource" />

            <script src="{{ asset('js/ressource.js') }}" defer></script>

        </div>

    </x-triptyque>
</x-app-layout>