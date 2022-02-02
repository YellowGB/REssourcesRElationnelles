@extends('layouts.app')

@section('content')

    @guest 
        @foreach ($ressources as $ressource)
            @if ($ressource->restriction === 'public')
                {{ display_ressource_preview($ressource) }}
            @endif
        @endforeach
    @endguest
    @auth
        @can('access-admin')
            @foreach ($ressources as $ressource)
                {{ display_ressource_preview($ressource) }}
            @endforeach
        @else
            @foreach ($ressources as $ressource)
                @if ($ressource->user_id === Auth::user()->id || $ressource->restriction === 'public')
                    {{ display_ressource_preview($ressource) }}
                @endif
            @endforeach
        @endcan
    @endauth
    
    {{-- Pour modifier facilement la chaine qui est echo dans display_ressource_preview() --}}
    {{-- <div style="border: 1px solid black; background-color:lightgrey; cursor: pointer;" onclick="location.href='{{ route('ressources.show', ['id' => $ressource->id]) }}'">
        <h2>{{ __('titles.type.' . $ressource->ressourceable_type) }}</h2>
        <h3>{{ __('titles.relation.' . $ressource->relation) }}</h3>
        <h1>{{ $ressource->title }}</h1>
    </div> --}}
    

@endsection