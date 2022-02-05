<div>
    @switch($ressource->ressourceable_type)
        @case($types['Activite'])
            <x-content-activite :content="$content" />
            @break
        @case($types['Article'])
            <x-content-article :content="$content" />
            @break
        @case($types['Atelier'])
            <x-content-atelier :content="$content" />
            @break
        @case($types['Course'])
            <x-content-course :content="$content" />
            @break
        @case($types['Defi'])
            <x-content-defi :content="$content" />
            @break
        @case($types['Jeu'])
            <x-content-jeu :content="$content" />
            @break
        @case($types['Lecture'])
            <x-content-lecture :content="$content" />
            @break
        @case($types['Photo'])
            <x-content-photo :content="$content" />
            @break
        @case($types['Video'])
            <x-content-video :content="$content" />
            @break
        @default
            <h1>{{ __('titles.content.none') }}</h1>
            
    @endswitch
</div>