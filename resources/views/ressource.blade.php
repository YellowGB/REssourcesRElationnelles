@extends('layout.app')

@section('content')

    <h1>{{ $ressource->title }}</h1>
    <p>{{ __('titles.section.type') }} : {{ __('titles.type.' . $ressource->ressourceable_type) }}</p>
    <p>{{ __('titles.section.category') }} : {{ __('titles.category.' . $ressource->categorie->name) }}</p>
    <p>{{ __('titles.section.relation') }} : {{ __('titles.relation.' . $ressource->relation) }}</p>
    <p>
        {{ trans_choice('titles.created', 2) }}
        {{ \Carbon\Carbon::parse($ressource->created_at)->format('d/m/Y') }}
        {{ __('titles.at') }}
        {{ \Carbon\Carbon::parse($ressource->created_at)->format('H:i') }}
    </p>
    <p>
        {{ trans_choice('titles.updated', 2) }}
        {{ \Carbon\Carbon::parse($ressource->updated_at)->format('d/m/Y') }}
        {{ __('titles.at') }}
        {{ \Carbon\Carbon::parse($ressource->updated_at)->format('H:i') }}
    </p>
    @if (is_null($ressource->user->nickname))
        <p>{{ __('titles.by') }} {{ $ressource->user->firstname }} {{ $ressource->user->name }}</p>
    @else
        <p>{{ __('titles.by') }} {{ $ressource->user->nickname }}</p>
    @endif

    {{-- Contenu --}}
    @switch($ressource->ressourceable_type)
        {{-- Début Activite --}}
        @case('App\Models\Activite')
            <h3>{{ __('titles.content.description') }}</h3>
            <p>{{ $content->description }}</p>
            <p>
                {{ __('titles.content.starting') }}
                {{ \Carbon\Carbon::parse($content->starting_date)->format('d/m/Y') }}
                {{ __('titles.at') }}
                {{ \Carbon\Carbon::parse($content->starting_date)->format('H:i') }}
            </p>
            <p>{{ __('titles.content.duration') }} : {{ $content->duration }}min</p>
            @break
        {{-- Fin Activite --}}
        {{-- Début Article --}}
        @case('App\Models\Article')
            <p>{{ __('titles.link.source') }} : {{ $content->source_url }}</p>
            @break
        {{-- Fin Article --}}
        {{-- Début Atelier --}}
        @case('App\Models\Atelier')
            <h3>{{ __('titles.content.description') }}</h3>
            <p>{{ $content->description }}</p>
            @break
        {{-- Fin Atelier --}}
        {{-- Début Course --}}
        @case('App\Models\Course')
            <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p>
            <p>{{ __('titles.filename') }} : {{ $content->file_name }}</p>
            @break
        {{-- Fin Course --}}
        {{-- Début Defi --}}
        @case('App\Models\Defi')
            <h3>{{ __('titles.content.description') }}</h3>
            <p>{{ $content->description }}</p>
            @if ( ! is_null($content->bonus))
                <h4>{{ __('titles.content.bonus') }}</h4>
                <p>{{ $content->bonus }}</p>
            @endif
            @break
        {{-- Fin Defi --}}
        {{-- Début Jeu --}}
        @case('App\Models\Jeu')
            <h3>{{ __('titles.content.description') }}</h3>
            <p>{{ $content->description }}</p>
            <p>
                {{ __('titles.content.starting') }}
                {{ \Carbon\Carbon::parse($content->starting_date)->format('d/m/Y') }}
                {{ __('titles.at') }}
                {{ \Carbon\Carbon::parse($content->starting_date)->format('H:i') }}
            </p>
            <p>{{ __('titles.link.link') }} : {{ $content->link }}</p>
            @break
        {{-- Fin Jeu --}}
        {{-- Début Lecture --}}
        @case('App\Models\Lecture')
            <h2>{{ __('titles.content.title') }} : {{ $content->title }}</h2>
            <p>{{ trans_choice('titles.author', 1) }} : {{ $content->author }}</p>
            <p>{{ __('titles.content.publication') }} : {{ $content->year }}</p>
            <p>{{ __('titles.content.summary') }} : {{ $content->summary }}</p>
            <p>{{ __('titles.content.analysis') }} : {{ $content->analysis }}</p>
            <p>{{ __('titles.content.review') }} : {{ $content->review }}</p>
            @break
        {{-- Fin Lecture --}}
        {{-- Début Photo --}}
        @case('App\Models\Photo')
            <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p>
            @if ( ! is_null($content->photo_author))
                <p>{{ trans_choice('titles.author', 1) }} : {{ $content->photo_author }}</p>
            @endif
            @if ( ! is_null($content->legend))
                <p>{{ __('titles.content.legend') }} : {{ $content->legend }}</p>
            @endif
            @break
        {{-- Fin Photo --}}
        {{-- Début Video --}}
        @case('App\Models\Video')
            @if (is_null($content->link))
                <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p>
            @else
                <p>{{ __('titles.link.link') }} : {{ $content->link }}</p>
            @endif
            @if ( ! is_null($content->legend))
                <p>{{ __('titles.content.legend') }} : {{ $content->legend }}</p>
            @endif
            @break
        {{-- Fin Video --}}
        @default
            <h1>{{ __('titles.content.none') }}</h1>
            
    @endswitch
    {{-- Fin du contenu --}}
    {{-- Edition --}}
    <form action="{{ route('ressources.edit', ['id' => $ressource->id]) }}">
        <input type="submit" value="Editer la ressource">
    </form>
    <form action="{{ route('ressources.destroy', ['id' => $ressource->id]) }}" method="POST">
        {{-- <input type="hidden" name="_method" value="DELETE"> --}}
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Supprimer la ressource">
    </form>

@endsection