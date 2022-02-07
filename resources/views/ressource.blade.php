<x-app-layout>

    <x-ressource-header :ressource="$ressource" />

    <x-content-display :ressource="$ressource" :content="$content" />
    
    {{-- Edition --}}
    @can('update-ressources', $ressource)
        <form action="{{ route('resources.edit', ['id' => $ressource->id]) }}">
            <input type="submit" value="{{ __('titles.edit.ressource') }}">
        </form>
    @endcan

    {{-- Commentaires --}}
    <h2>{{ __('titles.section.comments') }}</h2>
    @foreach ($ressource->commentaires as $commentaire)
        @if (is_null($commentaire->replies_to))
            <div class="comment">
               <x-commentaire-display :commentaire="$commentaire" />
               @auth
                    <form action="{{ route('comment.report', ['id' => $commentaire->id]) }}">
                        <input type="submit" value="{{ __('titles.btn.report') }}">
                    </form>
               @endauth
                {{-- Réponses --}}
                @foreach ($ressource->commentaires as $reponse)
                    @if (isset($reponse->replies_to) && $commentaire->id === $reponse->replies_to)
                        <x-commentaire-reply-display :reply="$reponse" />
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach

</x-app-layout>