<x-app-layout>

    @auth
        @can('publish-ressources')
            @if($ressource->status == \App\Enums\RessourceStatus::Pending->value)
                <form action="{{ route('ressources.valider', $ressource->id) }}" method="POST">
                    @csrf
                    <input type="submit" value="{{ __('titles.moderation.validate') }}" />
                </form>
                <form action="{{ route('ressources.rejeter', $ressource->id) }}" method="GET">
                    <input type="submit" value="{{ __('titles.moderation.dismiss') }}" />
                </form>
            @endif
        @endcan
    @endauth
    @auth
        @can('publish-ressources')
            @if($ressource->status == \App\Enums\RessourceStatus::Published->value)
                <form action="{{ route('ressources.destroy', $ressource->id) }}" method="GET">
                    @csrf
                    <input type="submit" value="{{ __('titles.moderation.suspend') }}" />
                </form>
            @endif
        @endcan
    @endauth

    <x-ressource-header :ressource="$ressource" />

    <x-content-display :ressource="$ressource" :content="$content" />
    
    {{-- Edition --}}
    @can('update-ressources', $ressource)
        <form action="{{ route('ressources.edit', ['id' => $ressource->id]) }}">
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