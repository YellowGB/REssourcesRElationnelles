@extends('layout.app')

@section('content')

    <h1>{{ $ressource->title }}</h1>
    <p>{{ $content->description }}</p>

@endsection