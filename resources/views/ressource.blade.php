@extends('layout.app')

@section('content')

    <h1>{{ $ressource->title }}</h1>
    <p>Type : {{ get_ressource_type($ressource->ressourceable_type) }}</p>
    <p>Catégorie : {{ $ressource->categorie->name }}</p>
    <p>Relation : {{ $ressource->relation }}</p>
    <p>
        Créée le
        {{ \Carbon\Carbon::parse($ressource->created_at)->format('d/m/Y') }}
        à
        {{ \Carbon\Carbon::parse($ressource->created_at)->format('H:i') }}
    </p>
    <p>
        Modifiée le
        {{ \Carbon\Carbon::parse($ressource->updated_at)->format('d/m/Y') }}
        à
        {{ \Carbon\Carbon::parse($ressource->updated_at)->format('H:i') }}
    </p>
    @if (is_null($ressource->user->nickname))
        <p>Par {{ $ressource->user->firstname }} {{ $ressource->user->name }}</p>
    @else
        <p>Par {{ $ressource->user->nickname }}</p>
    @endif

    {{-- Contenu --}}
    @switch($ressource->ressourceable_type)
        {{-- Début Activite --}}
        @case('App\Models\Activite')
            <h3>Description</h3>
            <p>{{ $content->description }}</p>
            <p>
                Démarre le
                {{ \Carbon\Carbon::parse($content->starting_date)->format('d/m/Y') }}
                à
                {{ \Carbon\Carbon::parse($content->starting_date)->format('H:i') }}
            </p>
            <p>Durée : {{ $content->duration }}min</p>
            @break
        {{-- Fin Activite --}}
        {{-- Début Article --}}
        @case('App\Models\Article')
            <p>Source : {{ $content->source_url }}</p>
            @break
        {{-- Fin Article --}}
        {{-- Début Atelier --}}
        @case('App\Models\Atelier')
            <h3>Description</h3>
            <p>{{ $content->description }}</p>
            @break
        {{-- Fin Atelier --}}
        {{-- Début Course --}}
        @case('App\Models\Course')
            <p>Emplacement du fichier : {{ $content->file_uri }}</p>
            <p>Nom du fichier : {{ $content->file_name }}</p>
            @break
        {{-- Fin Course --}}
        {{-- Début Defi --}}
        @case('App\Models\Defi')
            <h3>Description</h3>
            <p>{{ $content->description }}</p>
            <h4>Bonus</h4>
            <p>{{ $content->bonus }}</p>
            @break
        {{-- Fin Defi --}}
        {{-- Début Jeu --}}
        @case('App\Models\Jeu')
            <h3>Description</h3>
            <p>{{ $content->description }}</p>
            <p>
                Démarre le
                {{ \Carbon\Carbon::parse($content->starting_date)->format('d/m/Y') }}
                à
                {{ \Carbon\Carbon::parse($content->starting_date)->format('H:i') }}
            </p>
            <p>Lien : {{ $content->link }}</p>
            @break
        {{-- Fin Jeu --}}
        {{-- Début Lecture --}}
        @case('App\Models\Lecture')
            <h2>Titre : {{ $content->title }}</h2>
            <p>Auteur : {{ $content->author }}</p>
            <p>Année de parution : {{ $content->year }}</p>
            <p>Résumé : {{ $content->summary }}</p>
            <p>Analyse : {{ $content->analysis }}</p>
            <p>Avis : {{ $content->review }}</p>
            @break
        {{-- Fin Lecture --}}
        {{-- Début Photo --}}
        @case('App\Models\Photo')
            <p>Emplacement du fichier : {{ $content->file_uri }}</p>
            <p>Auteur : {{ $content->photo_author }}</p>
            <p>Légende : {{ $content->legend }}</p>
            @break
        {{-- Fin Photo --}}
        {{-- Début Video --}}
        @case('App\Models\Video')
            @if (is_null($content->link))
                <p>Emplacement du fichier : {{ $content->file_uri }}</p>
            @else
                <p>Lien : {{ $content->link }}</p>
            @endif
            <p>Légende : {{ $content->legend }}</p>
            @break
        {{-- Fin Video --}}
        @default
            <h1>Aucun contenu trouvé pour cette ressource</h1>
            
    @endswitch
    {{-- Fin du contenu --}}

@endsection