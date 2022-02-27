<x-app-layout>
    <div class="m-4">
        {{-- Modération de ressource --}}
        @auth
            @modo
                @if($ressource->status == \App\Enums\RessourceStatus::Pending->value)
                    <form action="{{ route('resources.valider', $ressource->id) }}" method="POST">
                        @csrf
                        <input type="submit" value="{{ __('titles.moderation.validate') }}" />
                    </form>
                    <form action="{{ route('resources.rejeter', $ressource->id) }}">
                        <input type="submit" value="{{ __('titles.moderation.dismiss') }}" />
                    </form>
                @elseif($ressource->status == \App\Enums\RessourceStatus::Published->value)
                    <form action="{{ route('resources.suspendre', $ressource->id) }}" method="POST">
                        @csrf
                        <input type="submit" value="{{ __('titles.moderation.suspend') }}" />
                    </form>
                @endif
            @endmodo
        @endauth

        <x-ressource-header :ressource="$ressource" />

        <x-content-display :ressource="$ressource" :content="$content" />
        
        {{-- Edition --}}
        @can('update-ressources', $ressource)
            <form action="{{ route('resources.edit', ['id' => $ressource->id]) }}">
                <input type="submit" value="{{ __('titles.edit.ressource') }}">
            </form>
        @endcan

        <div id="share">
            <button onclick="copyToClipboard()">
                <x-icons.share />
            </button>
        </div>

        {{-- Commentaires --}}
        <h2>{{ __('titles.section.comments') }}</h2>

        <x-commentaire-add :ressource="$ressource" />

        @foreach ($ressource->commentaires as $commentaire)
            @if (is_null($commentaire->replies_to))
                <div class="comment">
                <x-commentaire-display :commentaire="$commentaire"  />
                <button onclick="replyComment({{ $commentaire->id }})">{{ __('Reply') }}</button>
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
            <x-commentaire-add :ressource="$ressource" :commentaire="$commentaire" />
        @endforeach

        <script src="{{ asset('js/ressource.js') }}" defer></script>

    </div>
</x-app-layout>