@extends('layout.app')

@section('content')

    <h1>Créer une ressource</h1>
    <form action="{{ route( 'ressources.store' ) }}" method="post">
        @csrf
        <div class="ressource-container"">
            {{-- Partie commune --}}
            <input type="text" name="title" required>
            <select name="relation">
                <option value="soi">Soi</option>
                <option value="conjoints">Conjoints</option>
                <option value="famille">Famille</option>
                <option value="pro">Professionnelle</option>
                <option value="amis">Amis et communautés</option>
                <option value="inconnus">Inconnus</option>
            </select>
            <select name="categorie_id">
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
            <select name="ressourceable_type" id="select">
                <option value="App\Models\Activite">Activité</option>
                <option value="App\Models\Article">Article</option>
                <option value="App\Models\Atelier">Atelier</option>
            </select>

            {{-- Contenu --}}
            <div id="activite" class="ressource-content">
                <textarea name="activite_description" cols="30" rows="10" required></textarea>
                <input type="datetime-local" name="activite_starting_date" required>
                <input type="number" step="1" name="activite_duration" required>
            </div>
            <div id="article" class="ressource-content" style="display: none;">
                <input type="text" name="article_source_url">
            </div>
            <div id="atelier" class="ressource-content" style="display: none;">
                <textarea name="atelier_description" cols="30" rows="10"></textarea>
            </div>

            <button type="submit">Créer</button>
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