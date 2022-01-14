@extends('layout.app')

@section('content')
    
    @for ($i = 0; $i < count($ressources); $i++)
        <h1>{{ $ressources[$i]->title }}</h1>
        <p>{{ $contents[$i]->description }}</p>
    @endfor

@endsection