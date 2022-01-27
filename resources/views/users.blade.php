@extends('layouts.app')

@section('content')
    
    <h1>Les utilisateurs</h1>
    @foreach ($users as $user)
        <h2>{{ $user->firstname }}</h2>
        <p>{{__('titles.section.role')}} : {{ __('titles.role.' . $user->role->name) }}</p>
    @endforeach

@endsection