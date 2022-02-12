<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-blanc leading-tight" id="header">
            {{-- Si $ressource existe et n'est pas null, on est sur une édition et non une création --}}
            {{ isset($ressource) ? __('titles.edit.ressource') : __('titles.create.ressource') }}
        </h2>
    </x-slot>
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    
    <form action="{{ isset($ressource) ? route('resources.update', ['id' => $ressource->id, 'ressourceable_id' => $ressource->ressourceable_id]) : route('resources.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="hidden flex-col lg:w-2/3 place-items-center" id="ressource-container">
            {{-- Partie commune --}}
            <x-ressource-creation-common :ressource="$ressource ?? null" />

            <x-icons.chevron-double-down />

            {{-- Contenu --}}
            <x-ressource-creation-content-picker :content="$content ?? null" />

            <button type="submit" class="mt-4">{{ isset($ressource) ? __('titles.btn.edit') : __('titles.btn.create') }}</button>
        </div>
    </form>

    @edit($ressource)
        @can('delete-ressources', $ressource)
            <form action="{{ route('resources.destroy', $ressource->id) }}" method="get">
                <button type="submit">{{ __('titles.btn.delete') }}</button>
            </form>
        @endcan
    @endedit

    <script src="{{ asset('js/creation-ressource.js') }}" defer></script>

    {{-- On charge la modale de sélection du type --}}
    @create($ressource)
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Livewire.emit('openModal', 'ressource-type-picker');
            });
        </script>
    @endcreate

</x-app-layout>