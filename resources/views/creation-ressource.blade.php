@extends('layout.app')

@section('content')

    <h1>Créer une ressource</h1>
    <form action="{{ route( 'ressources.store' ) }}" method="post">
        @csrf
        <div style="display:flex;flex-direction:column;margin:1rem;">
            {{-- Partie commune --}}
            <input type="text" name="title" style="border: 2px solid black" required>
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
                <option value="App\Models\Atelier">Atelier</option>
            </select>

            {{-- Contenu --}}
            <div id="activite" class="ressource-content" style="display:flex;flex-direction:column;">
                <textarea name="description" cols="30" rows="10" style="border: 2px solid black"></textarea>
                <input type="datetime-local" name="starting_date">
                <input type="number" step="1" name="duration">
            </div>
            <div id="atelier" class="ressource-content" style="display:none;flex-direction:column;">
                <textarea name="description" cols="30" rows="10" style="border: 2px solid black"></textarea>
            </div>

            <button type="submit">Créer</button>
        </div>
    </form>

    <script>
        const activite      = document.getElementById('activite');
        const atelier       = document.getElementById('atelier');
        const contentDivs   = document.getElementsByClassName('ressource-content');

        const select        = document.getElementById('select');

        select.addEventListener("change", (e) => {

            for (var i = 0; i < contentDivs.length; i++) {
                contentDivs[i].style.display = "none";
            }
            
            switch (select.value) {
                case 'App\\Models\\Activite':
                    activite.style.display = "flex";
                    break;
                case 'App\\Models\\Atelier':
                    atelier.style.display = "flex";
                    break;
            }
        });
    </script>

@endsection