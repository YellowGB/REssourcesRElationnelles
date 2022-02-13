<div class="flex items-center ml-4">
    <x-button class="bg-noir dark:bg-blanc text-blanc dark:text-noir rounded-full hover:rounded-lg transition-all duration-100 ease-in-out" id="theme-toggler">
        <x-icons.sun />
        <x-icons.moon class="hidden" />
        <span class="ml-2 text-blanc dark:text-noir">{{ __('titles.section.theme') }}</span>
        {{-- Composant livewire pour la requête AJAX de changement de thème --}}
        <livewire:user-theme />
    </x-button>
</div>