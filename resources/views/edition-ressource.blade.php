@extends('layout.app')

@section('content')
{{-- <p></p> --}}

    <h1>{{ __('titles.edit.ressource') }}</h1>
    <form action="{{ route('ressources.update', ['id' => $ressource->id] ) }}" method="post">
        @csrf
        <div class="ressource-container">
            {{-- Partie commune --}}
            <input type="text" name="title" placeholder="{{ __('titles.title') }}" value="{{ $ressource->title }}" required></input>
            <select name="relation">
                <option selected disabled>{{ __('titles.select.relation') }}</option>
                @foreach ($relations as $relation)
                    @if ($ressource->relation === $relation)
                        <option selected value="{{ $relation }}">{{ __('titles.relation.' . $relation) }}</option>
                    @else
                        <option value="{{ $relation }}">{{ __('titles.relation.' . $relation) }}</option>
                    @endif
                @endforeach
            </select>
            <select name="categorie_id">
                <option disabled>{{ __('titles.select.category') }}</option>
                @foreach ($categories as $categorie)
                    @if ($ressource->categorie_id === $categorie->id)
                        <option selected value="{{ $categorie->id }}">{{ __('titles.category.' . $categorie->name) }}</option>
                    @else
                        <option value="{{ $categorie->id }}">{{ __('titles.category.' . $categorie->name) }}</option>
                    @endif
                @endforeach
            </select>
            <select name="ressourceable_type" id="select">
                @foreach ($types as $type) {{-- types est défini dans AppServiceProvider --}}
                    @if ($ressource->ressourceable_type === $type)
                        <option selected value="{{ $type }}">{{ __('titles.type.' . $type) }}</option>
                    @else
                        <option value="{{ $type }}">{{ __('titles.type.' . $type) }}</option>
                    @endif
                @endforeach
            </select>

            {{-- Contenu --}}
            <div id="activite" class="ressource-content" style="display: none;">
                <textarea name="activite_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}">{{ $content->description }}</textarea>
                <p class="input-title">{{ __('titles.content.starting') }}</p>
                <input type="datetime-local" name="activite_starting_date" value="{{ substr(str_replace(' ', 'T', $content->starting_date), 0, strlen($content->starting_date) - 3) }}"></input>
                <p class="input-title">{{ __('titles.content.duration') }}</p>
                <input type="number" step="1" name="activite_duration" value="{{ $content->duration }}"></input>
            </div>
            <div id="article" class="ressource-content" style="display: none;">
                <input type="text" name="article_source_url" placeholder="{{ __('titles.link.source') }}" value="{{ $content->source_url }}"></input>
            </div>
            <div id="atelier" class="ressource-content" style="display: none;">
                <textarea name="atelier_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}">{{ $content->description }}</textarea>
            </div>
            <div id="course" class="ressource-content" style="display: none;">
                <input type="text" name="course_file_uri" placeholder="{{ __('titles.link.uri') }}" value="{{ $content->file_uri }}"></input>
                <input type="text" name="course_file_name" placeholder="{{ __('titles.filename') }}" value="{{ $content->file_name }}"></input>
            </div>
            <div id="defi" class="ressource-content" style="display: none;">
                <textarea name="defi_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}">{{ $content->description }}</textarea>
                <textarea name="defi_bonus" cols="30" rows="5" placeholder="{{ __('titles.content.bonus') }}">{{ $content->bonus }}</textarea>
            </div>
            <div id="jeu" class="ressource-content" style="display: none;">
                <textarea name="jeu_description" cols="30" rows="10" placeholder="{{ __('titles.content.description') }}">{{ $content->description }}</textarea>
                <p class="input-title">{{ __('titles.content.starting') }}</p>
                <input type="datetime-local" name="jeu_starting_date" value="{{ substr(str_replace(' ', 'T', $content->starting_date), 0, strlen($content->starting_date) - 3) }}"></input>
                <input type="text" name="jeu_link" placeholder="{{ __('titles.link.link') }}" value="{{ $content->link }}"></input>
            </div>
            <div id="lecture" class="ressource-content" style="display: none;">
                <input type="text" name="lecture_title" placeholder="{{ __('titles.content.title') }}" value="{{ $content->title }}"></input>
                <input type="text" name="lecture_author" placeholder="{{ trans_choice('titles.author', 1) }}" value="{{ $content->author }}"></input>
                <p class="input-title">{{ __('titles.content.publication') }}</p>
                <input type="number" name="lecture_year" min="1000" max="2099" step="1" value="{{ $content->year }}"></input>
                <textarea name="lecture_summary" cols="30" rows="10" placeholder="{{ __('titles.content.summary') }}">{{ $content->summary }}</textarea>
                <textarea name="lecture_analysis" cols="30" rows="10" placeholder="{{ __('titles.content.analysis') }}">{{ $content->analysis }}</textarea>
                <textarea name="lecture_review" cols="30" rows="10" placeholder="{{ __('titles.content.review') }}">{{ $content->review }}</textarea>
            </div>
    
            <div id="photo" class="ressource-content" style="display: none;">
                <input type="text" name="photo_file_uri" placeholder="{{ __('titles.link.uri') }}" value="{{ $content->file_uri }}"></input>
                <input type="text" name="photo_author" placeholder="{{ trans_choice('titles.author', 1) }}" value="{{ $content->photo_author }}"></input>
                <input type="text" name="photo_legend" placeholder="{{ __('titles.content.legend') }}" value="{{ $content->legend }}"></input>
            </div>
            <div id="video" class="ressource-content" style="display: none;">
                <input type="text" name="video_file_uri" placeholder="{{ __('titles.link.uri') }}" value="{{ $content->file_uri }}""></input>
                <input type="text" name="video_link" placeholder="{{ __('titles.link.link') }}" value="{{ $content->link }}"></input>
                <input type="text" name="video_legend" placeholder="{{ __('titles.content.legend') }}" value="{{ $content->legend }}"></input>
            </div>

            <button type="submit">{{ __('titles.btn.edit') }}</button>
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

        // Au chargement de la page, charger les champs de contenu correspondant à la ressource à éditer
        displayContentFields();

        select.addEventListener("change", (e) => { displayContentFields(); });
        
        function displayContentFields() {
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
        }
    </script>

@endsection