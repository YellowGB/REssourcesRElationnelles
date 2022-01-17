@extends('layout.app')

@section('content')

    <h1>{{ __('titles.create.ressource') }}</h1>
    <form action="{{ route( 'ressources.store' ) }}" method="post">
        @csrf
        <div class="ressource-container"">
            {{-- Partie commune --}}
            <input type="text" name="title" placeholder="{{ __('titles.title') }}" required>
            <select name="relation">
                <option selected disabled>{{ __('titles.select.relation') }}</option>
                <option value="self">{{ __('titles.relation.self') }}</option>
                <option value="spouse">{{ __('titles.relation.spouse') }}</option>
                <option value="family">{{ __('titles.relation.family') }}</option>
                <option value="pro">{{ __('titles.relation.pro') }}</option>
                <option value="friend">{{ __('titles.relation.friend') }}</option>
                <option value="stranger">{{ __('titles.relation.stranger') }}</option></optgroup>
            </select>
            <select name="categorie_id">
                <option selected disabled>{{ __('titles.select.category') }}</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ __('titles.category.' . $categorie->name) }}</option>
                @endforeach
            </select>
            <select name="ressourceable_type" id="select">
                <option selected disabled>{{ __('titles.select.type') }}</option>
                <option value="App\Models\Activite">{{ __('titles.type.App\Models\Activite') }}</option>
                <option value="App\Models\Article">{{ __('titles.type.App\Models\Article') }}</option>
                <option value="App\Models\Atelier">{{ __('titles.type.App\Models\Atelier') }}</option>
            </select>

            {{-- Contenu --}}
            <div id="activite" class="ressource-content">
                <textarea name="activite_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}" required></textarea>
                <p class="input-title">{{ __('titles.content.starting') }}</p>
                <input type="datetime-local" name="activite_starting_date" required>
                <p class="input-title">{{ __('titles.content.duration') }}</p>
                <input type="number" step="1" name="activite_duration" required>
            </div>
            <div id="article" class="ressource-content" style="display: none;">
                <input type="text" name="article_source_url" placeholder="{{ __('titles.link.source') }}">
            </div>
            <div id="atelier" class="ressource-content" style="display: none;">
                <textarea name="atelier_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}"></textarea>
            </div>

            <button type="submit">{{ __('titles.btn.create') }}</button>
        </div>
    </form>

    <script>
        const activite      = document.getElementById('activite');
        const article       = document.getElementById('article');
        const atelier       = document.getElementById('atelier');
        const contentDivs   = document.getElementsByClassName('ressource-content');

        const select        = document.getElementById('select');

        select.addEventListener("change", (e) => {

            for (var i = 0; i < contentDivs.length; i++) {
                // On cache d'abord tous les divs de contenu
                contentDivs[i].style.display = "none";

                // On retire la mention required de tous les enfants des divs de contenu pour éviter des problèmes lors de la soumission
                var nodes = contentDivs[i].childNodes;
                for (var j = 0; j < nodes.length; j++) {
                    nodes[j].required = false;
                }
            }
            
            // On affiche uniquement le div correspondant au type sélectionné et on indique les champs requis
            switch (select.value) {
                case 'App\\Models\\Activite':

                    activite.style.display = "flex";

                    document.getElementsByName('activite_description')[0].required = true;
                    document.getElementsByName('activite_starting_date')[0].required = true;
                    document.getElementsByName('activite_duration')[0].required = true;

                    break;
                case 'App\\Models\\Article':

                    article.style.display = "flex";

                    document.getElementsByName('article_source_url')[0].required = true;

                    break;
                case 'App\\Models\\Atelier':

                    atelier.style.display = "flex";

                    document.getElementsByName('atelier_description')[0].required = true;

                    break;
            }
        });
    </script>

@endsection