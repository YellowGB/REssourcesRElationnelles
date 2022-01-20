@extends('layout.app')

@section('content')

    @foreach ($ressources as $ressource)
        @foreach ($users as $user)
            {{-- utilisateurs : id 4 -> citoyen (role_id = 2)
                                id 2 -> superadmin (role_id = 1)
                                id 9 -> admin (role_id = 3)  --}}
            @if ($user->id == "2") {{-- chiffre à changer en fonction du tableau ci-dessus --}}
                @if ($user->role_id == "2")
                    @if ($ressource->restriction == "public")
                        <div style="border: 1px solid black; background-color:lightgrey; cursor: pointer;" onclick="location.href='{{ route('ressources.show', ['id' => $ressource->id]) }}'">
                            <h2>{{ __('titles.type.' . $ressource->ressourceable_type) }}</h2>
                            <h3>{{ __('titles.relation.' . $ressource->relation) }}</h3>
                            <h1>{{ $ressource->title }}</h1>
                            <p>Restriction : {{$ressource->restriction}}</p>
                        </div>
                    @endif
                @else
                    <div style="border: 1px solid black; background-color:lightgrey; cursor: pointer;" onclick="location.href='{{ route('ressources.show', ['id' => $ressource->id]) }}'">
                        <h2>{{ __('titles.type.' . $ressource->ressourceable_type) }}</h2>
                        <h3>{{ __('titles.relation.' . $ressource->relation) }}</h3>
                        <h1>{{ $ressource->title }}</h1>
                        <p>Restriction : {{$ressource->restriction}}</p>
                    </div>
                @endif
            @endif
        @endforeach
    @endforeach
    
    {{-- @for ($i = 0; $i < count($ressources); $i++)
        <h2>{{ __('titles.type.' . $ressources[$i]->ressourceable_type) }}</h2>
        <h3>{{ $ressources[$i]->relation }}</h3>
        <h1>{{ $ressources[$i]->title }}</h1>
        <p>{{ $contents[$i]->description }}</p>
    @endfor --}}

@endsection