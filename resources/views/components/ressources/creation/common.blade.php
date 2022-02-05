{{-- <div> --}}
    <input type="text" name="title" placeholder="{{ __('titles.title') }}" value="{{ isset($ressource) ? $ressource->title : '' }}" required></input>
    <select name="relation">
        <option {{ isset($ressource) ? '' : 'selected' }} disabled>{{ __('titles.select.relation') }}</option>
        @foreach ($relations as $relation)
            @if (isset($ressource->relation) && $ressource->relation === $relation)
                <option selected value="{{ $relation }}">{{ __('titles.relation.' . $relation) }}</option>
            @else
                <option value="{{ $relation }}">{{ __('titles.relation.' . $relation) }}</option>
            @endif
        @endforeach
    </select>
    <select name="categorie_id">
        <option {{ isset($ressource) ? '' : 'selected' }} disabled>{{ __('titles.select.category') }}</option>
        @foreach ($categories as $categorie)
            @if (isset($ressource->categorie_id) && $ressource->categorie_id === $categorie->id)
                <option selected value="{{ $categorie->id }}">{{ __('titles.category.' . $categorie->name) }}</option>
            @else
                <option value="{{ $categorie->id }}">{{ __('titles.category.' . $categorie->name) }}</option>
            @endif
        @endforeach
    </select>
    @if (isset($content)) {{-- Pour l'édition, on a besoin de faire passer l'id du contenu lors de l'update --}}
        <input type="text" name="ressourceable_id" value="{{ $content->id }}" hidden>
    @endif
    {{-- Dans le cas d'un édition, on affiche le nom du type et on cache la possibilité de changer la sélection --}}
    @if (isset($ressource))
        <p>{{ __('titles.type.' . $ressource->ressourceable_type) }}</p>
    @endif
    <select name="ressourceable_type" id="select" {{ isset($ressource) ? 'hidden' : '' }}>
        <option {{ isset($ressource) ? '' : 'selected' }} disabled>{{ __('titles.select.type') }}</option>
        @foreach ($types as $type) {{-- types est défini dans AppServiceProvider --}}
            @if (isset($ressource->ressourceable_type) && $ressource->ressourceable_type === $type)
                <option selected value="{{ $type }}">{{ __('titles.type.' . $type) }}</option>
            @else
                <option value="{{ $type }}">{{ __('titles.type.' . $type) }}</option>
            @endif
        @endforeach
    </select>
{{-- </div> --}}