@extends('layouts.app')

@section('content')

    <h1>{{ $ressource->title }}</h1>
    <p>{{ __('titles.section.type') }} : {{ __('titles.type.' . $ressource->ressourceable_type) }}</p>
    <p>{{ __('titles.section.category') }} : {{ __('titles.category.' . $ressource->categorie->name) }}</p>
    <p>{{ __('titles.section.relation') }} : {{ __('titles.relation.' . $ressource->relation) }}</p>
    <p>{{ format_horodatage($ressource, 'created', \App\Enums\LocGenderNumber::FeminineSingular) }}</p>
    <p>{{ format_horodatage($ressource, 'updated', \App\Enums\LocGenderNumber::FeminineSingular) }}</p>
    <p>{{ __('titles.by') }} {{ get_user_display_name($ressource->user) }}</p>

    {{-- Contenu --}}
    @switch($ressource->ressourceable_type)
        {{-- Début Activite --}}
        @case($types['Activite'])
            <h3>{{ __('titles.content.description') }}</h3>
            <p>{{ $content->description }}</p>
            <p>{{ format_starting_date($content) }}</p>
            <p>{{ __('titles.content.duration') }} : {{ $content->duration }}min</p>
            @break
        {{-- Fin Activite --}}
        {{-- Début Article --}}
        @case($types['Article'])
            <p>{{ __('titles.link.source') }} : {{ $content->source_url }}</p>
            @break
        {{-- Fin Article --}}
        {{-- Début Atelier --}}
        @case($types['Atelier'])
            <h3>{{ __('titles.content.description') }}</h3>
            <p>{{ $content->description }}</p>
            @break
        {{-- Fin Atelier --}}
        {{-- Début Course --}}
        @case($types['Course'])
            {{-- <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p> --}}
            {{-- <p>{{ __('titles.filename') }} : {{ $content->file_name }}</p> --}}
            <form action="{{ route('courses.show', ['id' => $content->id]) }}">
                <input type="submit" value="{{ __('titles.readfile') . ' ' . $content->file_name }}">
            </form>
            @break
        {{-- Fin Course --}}
        {{-- Début Defi --}}
        @case($types['Defi'])
            <h3>{{ __('titles.content.description') }}</h3>
            <p>{{ $content->description }}</p>
            @if (! is_null($content->bonus))
                <h4>{{ __('titles.content.bonus') }}</h4>
                <p>{{ $content->bonus }}</p>
            @endif
            @break
        {{-- Fin Defi --}}
        {{-- Début Jeu --}}
        @case($types['Jeu'])
            <h3>{{ __('titles.content.description') }}</h3>
            <p>{{ $content->description }}</p>
            <p>{{ format_starting_date($content) }}</p>
            <p>{{ __('titles.link.link') }} : {{ $content->link }}</p>
            @break
        {{-- Fin Jeu --}}
        {{-- Début Lecture --}}
        @case($types['Lecture'])
            <h2>{{ __('titles.content.title') }} : {{ $content->title }}</h2>
            <p>{{ trans_choice('titles.author', 1) }} : {{ $content->author }}</p>
            <p>{{ __('titles.content.publication') }} : {{ $content->year }}</p>
            <p>{{ __('titles.content.summary') }} : {{ $content->summary }}</p>
            <p>{{ __('titles.content.analysis') }} : {{ $content->analysis }}</p>
            <p>{{ __('titles.content.review') }} : {{ $content->review }}</p>
            @break
        {{-- Fin Lecture --}}
        {{-- Début Photo --}}
        @case($types['Photo'])
            {{-- <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p> --}}
            <img src="{{ asset('storage/' . $content->file_uri) }}" alt="{{ __('titles.type.photo') }}">
            @if (! is_null($content->photo_author))
                <p>{{ trans_choice('titles.author', 1) }} : {{ $content->photo_author }}</p>
            @endif
            @if (! is_null($content->legend))
                <p>{{ __('titles.content.legend') }} : {{ $content->legend }}</p>
            @endif
            @break
        {{-- Fin Photo --}}
        {{-- Début Video --}}
        @case($types['Video'])
            @if (is_null($content->link))
                {{-- <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p> --}}
                <video controls>
                    <source src="{{ asset('storage/' . $content->file_uri) }}" type="video/mp4">
                    {{-- <p>
                        Votre navigateur ne prend pas en charge les vidéos HTML5.
                        Voici <a href="{{ asset('storage/' . $content->file_uri) }}">un lien pour télécharger la vidéo</a>.
                    </p> --}}
                </video>
            @else
                <p>{{ __('titles.link.link') }} : {{ $content->link }}</p>
            @endif
            @if (! is_null($content->legend))
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
        <input type="submit" value="{{ __('titles.edit.ressource') }}">
    </form>

    {{-- Commentaires --}}
    <h2>{{ __('titles.section.comments') }}</h2>

    <form method="post" action="{{ route('commentaires.store', ['id' => $ressource->id, 'commentaire' => null]) }}">
        @csrf
        <input type="text" name="content" placeholder="{{ __('titles.comment.comment') }}" min="1" max="255">
        <input type="submit" value="{{ __('titles.comment.add_comment') }}">
    </form>
    @foreach ($ressource->commentaires as $commentaire)
        @if (is_null($commentaire->replies_to))
            <div class="comment">
               {{ display_commentaire($commentaire) }}
                <form method="post" action="{{ route('commentaires.store', ['id' => $ressource->id, 'commentaire' => $commentaire->id]) }}">
                    @csrf
                    <input type="text" name="content" placeholder="{{ __('titles.comment.respond') }}" min="1" max="255">
                    <input type="submit" value="{{ __('titles.comment.add_response') }}">
                </form>
                {{-- Réponses --}}
                @foreach ($ressource->commentaires as $reponse)
                    @if (isset($reponse->replies_to) && $commentaire->id === $reponse->replies_to)
                        <div class="reponse" style="margin-left: 5rem;">
                            {{ display_commentaire($reponse) }}
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach

@endsection