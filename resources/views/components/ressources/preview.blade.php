<div>
    <div style="border: 1px solid black; background-color:lightgrey; cursor: pointer;" onclick="location.href='{{ route('resources.show', ['id' => $ressource->id]) }}'">
        <h2>{{ __('titles.type.' . $ressource->ressourceable_type) }}</h2>
        <h3>{{ __('titles.relation.' . $ressource->relation) }}</h3>
        <h1>{{ $ressource->title }}</h1>
    </div>
</div>