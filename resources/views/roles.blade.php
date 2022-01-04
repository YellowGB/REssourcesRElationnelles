@extends('layout.app')

@section('content')
    
    @foreach ($roles as $role)
        <h2>{{ $role->name }}</h2>
    @endforeach

@endsection