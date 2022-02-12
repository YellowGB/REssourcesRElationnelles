<div class="flex flex-col gap-1 mt-6 place-items-center">
    <input
        type="text"
        name="title"
        placeholder="{{ __('titles.title') }}"
        value="{{ isset($ressource) ? $ressource->title : '' }}"
        class="w-128 lg:w-screen lg:max-w-screen-sm h-12"
        required
    />
    <div>
        <select
            name="relation"
            class="lg:w-72 h-9 text-sm"
        >
            <option {{ isset($ressource) ? '' : 'selected' }} disabled>{{ __('titles.select.relation') }}</option>
            @foreach ($relations as $relation)
                @if (isset($ressource->relation) && $ressource->relation === $relation)
                    <option selected value="{{ $relation }}">{{ __('titles.relation.' . $relation) }}</option>
                @else
                    <option value="{{ $relation }}">{{ __('titles.relation.' . $relation) }}</option>
                @endif
            @endforeach
        </select>
        <select
            name="categorie_id"
            class="lg:w-72 h-9 text-sm"
        >
            <option {{ isset($ressource) ? '' : 'selected' }} disabled>{{ __('titles.select.category') }}</option>
            @foreach ($categories as $categorie)
                @if (isset($ressource->categorie_id) && $ressource->categorie_id === $categorie->id)
                    <option selected value="{{ $categorie->id }}">{{ __('titles.category.' . $categorie->name) }}</option>
                @else
                    <option value="{{ $categorie->id }}">{{ __('titles.category.' . $categorie->name) }}</option>
                @endif
            @endforeach
        </select>
    </div>


    @edit($ressource)
        <p>{{ __('titles.type.' . $ressource->ressourceable_type) }}</p>
    @endedit
    <select name="ressourceable_type" id="select" hidden>
        <option {{ isset($ressource) ? '' : 'selected' }} disabled>{{ __('titles.select.type') }}</option>
        @foreach ($types as $type) {{-- types est défini dans AppServiceProvider --}}
            @if (isset($ressource->ressourceable_type) && $ressource->ressourceable_type === $type)
                <option selected value="{{ $type }}">{{ __('titles.type.' . $type) }}</option>
            @else
                <option value="{{ $type }}">{{ __('titles.type.' . $type) }}</option>
            @endif
        @endforeach
    </select>
</div>