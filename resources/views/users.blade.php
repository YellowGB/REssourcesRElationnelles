@extends('layout.app')

@section('content')
    
    <h1>Les utilisateurs</h1>
    @foreach ($users as $user)
        <h2>{{ $user->firstname }}</h2>
        <p>Role : {{ $user->role->name }}</p>
    @endforeach

@endsection