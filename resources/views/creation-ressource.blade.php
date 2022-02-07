<x-app-layout>

    {{-- Si $ressource existe et n'est pas null, on est sur une édition et non une création --}}
    <h1>{{ isset($ressource) ? __('titles.edit.ressource') : __('titles.create.ressource') }}</h1>
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    
    <form action="{{ isset($ressource) ? route('resources.update', ['id' => $ressource->id, 'ressourceable_id' => $ressource->ressourceable_id]) : route('resources.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="ressource-container">
            {{-- Partie commune --}}
            <x-ressource-creation-common :ressource="$ressource ?? null" />

            {{-- Contenu --}}
            <x-ressource-creation-content-picker :content="$content ?? null" />

            <button type="submit">{{ isset($ressource) ? __('titles.btn.edit') : __('titles.btn.create') }}</button>
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

</x-app-layout>