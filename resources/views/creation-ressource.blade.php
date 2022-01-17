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
                <option value="App\Models\Course">{{ __('titles.type.App\Models\Course') }}</option>
                <option value="App\Models\Defi">{{ __('titles.type.App\Models\Defi') }}</option>
                <option value="App\Models\Jeu">{{ __('titles.type.App\Models\Jeu') }}</option>
                <option value="App\Models\Lecture">{{ __('titles.type.App\Models\Lecture') }}</option>
                <option value="App\Models\Photo">{{ __('titles.type.App\Models\Photo') }}</option>
                <option value="App\Models\Video">{{ __('titles.type.App\Models\Video') }}</option>
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
            <div id="course" class="ressource-content" style="display: none;">
                <input type="text" name="course_file_uri" placeholder="{{ __('titles.link.uri') }}">
                <input type="text" name="course_file_name" placeholder="{{ __('titles.filename') }}">
            </div>
            <div id="defi" class="ressource-content" style="display: none;">
                <textarea name="defi_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}"></textarea>
                <textarea name="defi_bonus" cols="30" rows="5" placeholder="{{ __('titles.content.bonus') }}"></textarea>
            </div>
            <div id="jeu" class="ressource-content" style="display: none;">
                <textarea name="jeu_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}"></textarea>
                <p class="input-title">{{ __('titles.content.starting') }}</p>
                <input type="datetime-local" name="jeu_starting_date">
                <input type="text" name="jeu_link" placeholder="{{ __('titles.link.link') }}">
            </div>
            <div id="lecture" class="ressource-content" style="display: none;">
                <input type="text" name="lecture_title" placeholder="{{ __('titles.content.title') }}">
                <input type="text" name="lecture_author" placeholder="{{ trans_choice('titles.author', 1) }}">
                <p class="input-title">{{ __('titles.content.publication') }}</p>
                <input type="number" name="lecture_year" min="1000" max="2099" step="1">
                <textarea name="lecture_summary" cols="30" rows="10" placeholder="{{ __('titles.content.summary') }}"></textarea>
                <textarea name="lecture_analysis" cols="30" rows="10" placeholder="{{ __('titles.content.analysis') }}"></textarea>
                <textarea name="lecture_review" cols="30" rows="10" placeholder="{{ __('titles.content.review') }}"></textarea>
            </div>
            <div id="photo" class="ressource-content" style="display: none;">
                <input type="text" name="photo_file_uri" placeholder="{{ __('titles.link.uri') }}">
                <input type="text" name="photo_author" placeholder="{{ trans_choice('titles.author', 1) }}">
                <input type="text" name="photo_legend" placeholder="{{ __('titles.content.legend') }}">
            </div>
            <div id="video" class="ressource-content" style="display: none;">
                <input type="text" name="video_file_uri" placeholder="{{ __('titles.link.uri') }}">
                <input type="text" name="video_link" placeholder="{{ __('titles.link.link') }}">
                <input type="text" name="video_legend" placeholder="{{ __('titles.content.legend') }}">
            </div>

            <button type="submit">{{ __('titles.btn.create') }}</button>
        </div>
    </form>

    <script>
        const activite      = document.getElementById('activite');
        const article       = document.getElementById('article');
        const atelier       = document.getElementById('atelier');
        const course        = document.getElementById('course');
        const defi          = document.getElementById('defi');
        const jeu           = document.getElementById('jeu');
        const lecture       = document.getElementById('lecture');
        const photo         = document.getElementById('photo');
        const video         = document.getElementById('video');
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
                case 'App\\Models\\Course':

                    course.style.display = "flex";

                    document.getElementsByName('course_file_uri')[0].required = true;
                    document.getElementsByName('course_file_name')[0].required = true;

                    break;
                case 'App\\Models\\Defi':

                    defi.style.display = "flex";

                    document.getElementsByName('defi_description')[0].required = true;

                    break;
                case 'App\\Models\\Jeu':

                    jeu.style.display = "flex";

                    document.getElementsByName('jeu_description')[0].required = true;
                    document.getElementsByName('jeu_starting_date')[0].required = true;
                    document.getElementsByName('jeu_link')[0].required = true;

                    break;
                case 'App\\Models\\Lecture':

                    lecture.style.display = "flex";

                    document.getElementsByName('lecture_title')[0].required = true;
                    document.getElementsByName('lecture_author')[0].required = true;
                    document.getElementsByName('lecture_year')[0].required = true;
                    document.getElementsByName('lecture_summary')[0].required = true;
                    document.getElementsByName('lecture_analysis')[0].required = true;
                    document.getElementsByName('lecture_review')[0].required = true;

                    break;
                case 'App\\Models\\Photo':

                    photo.style.display = "flex";

                    document.getElementsByName('photo_file_uri')[0].required = true;

                    break;
                case 'App\\Models\\Video':

                    video.style.display = "flex";

                    break;
            }
        });
    </script>

@endsection