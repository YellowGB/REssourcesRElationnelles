@extends('layout.app')

@section('content') 
    @foreach ($ressources as $ressource)
              <div class="style-catalogue" onclick="location.href='{{ route('ressources.show', ['id' => $ressource->id]) }}'">
                  <div class="col">
                      <h2>{{ get_ressource_type($ressource->ressourceable_type) }}</h2>
                      <h3>{{ $ressource->relation }}</h3>
                      <h1>{{ $ressource->title }}</h1>
                  </div>
              </div>
          @endforeach
    
    {{-- @for ($i = 0; $i < count($ressources); $i++)
        <h2>{{ get_ressource_type($ressources[$i]->ressourceable_type) }}</h2>
        <h3>{{ $ressources[$i]->relation }}</h3>
        <h1>{{ $ressources[$i]->title }}</h1>
        <p>{{ $contents[$i]->description }}</p>
    @endfor --}}

@endsection