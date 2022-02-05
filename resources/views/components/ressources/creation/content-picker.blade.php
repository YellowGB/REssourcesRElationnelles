@if (isset($content))
    @switch($content)
        @case($content instanceof App\Models\Activite)
            <x-ressource-creation-activite :content="$content" />
            @break
        @case($content instanceof App\Models\Article)
            <x-ressource-creation-article :content="$content" />
            @break
        @case($content instanceof App\Models\Atelier)
            <x-ressource-creation-atelier :content="$content" />
            @break
        @case($content instanceof App\Models\Course)
            <x-ressource-creation-course :content="$content" />
            @break
        @case($content instanceof App\Models\Defi)
            <x-ressource-creation-defi :content="$content" />
            @break
        @case($content instanceof App\Models\Jeu)
            <x-ressource-creation-jeu :content="$content" />
            @break
        @case($content instanceof App\Models\Lecture)
            <x-ressource-creation-lecture :content="$content" />
            @break
        @case($content instanceof App\Models\Photo)
            <x-ressource-creation-photo :content="$content" />
            @break
        @case($content instanceof App\Models\Video)
            <x-ressource-creation-video :content="$content" />
            @break
            
    @endswitch
@else
    <x-ressource-creation-activite />
    <x-ressource-creation-article />
    <x-ressource-creation-atelier />
    <x-ressource-creation-course />
    <x-ressource-creation-defi />
    <x-ressource-creation-jeu />
    <x-ressource-creation-lecture />
    <x-ressource-creation-photo />
    <x-ressource-creation-video />
@endif