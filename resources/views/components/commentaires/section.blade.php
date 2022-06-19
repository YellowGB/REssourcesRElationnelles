@foreach ($ressource->commentaires as $commentaire)
    @if (is_null($commentaire->replies_to))
        <div class="comment" x-data>
            <x-commentaire-display :commentaire="$commentaire">
                <x-commentaires.actions :commentaire="$commentaire" />
            </x-commentaire-display>

            <x-commentaire-add :ressource="$ressource" :commentaire="$commentaire" class="ml-12" />

            {{-- Réponses --}}
            <p  @click="
                    $refs.replies{{ $commentaire->id }}.classList.toggle('hidden');
                    $refs.chevronDown{{ $commentaire->id }}.classList.toggle('hidden');
                    $refs.chevronUp{{ $commentaire->id }}.classList.toggle('hidden');
                    $refs.showrep{{ $commentaire->id }}.classList.toggle('hidden');
                    $refs.hiderep{{ $commentaire->id }}.classList.toggle('hidden');
                "
                class="ml-12 mb-2"
            >
                <span x-ref="repSection{{ $commentaire->id }}" class="hidden items-end cursor-pointer">
                    <x-icons.chevron-down x-ref="chevronDown{{ $commentaire->id }}" />
                    <x-icons.chevron-up x-ref="chevronUp{{ $commentaire->id }}" class="hidden" />
                    <span x-ref="showrep{{ $commentaire->id }}">
                        @lang('titles.comment.showrep')
                    </span>
                    <span x-ref="hiderep{{ $commentaire->id }}" class="hidden">
                        @lang('titles.comment.hiderep')
                    </span>
                </span>
            </p>
            <div x-ref="replies{{ $commentaire->id }}" class="hidden mb-6">
                @foreach ($ressource->commentaires as $reponse)
                    @if (isset($reponse->replies_to) && $commentaire->id === $reponse->replies_to)
                        {{-- Si on rentre ici, il y a au moins une réponse et on affiche la section permettant de toggle l'affichage --}}
                        <div x-init="
                            $refs.repSection{{ $commentaire->id }}.classList.remove('hidden');
                            $refs.repSection{{ $commentaire->id }}.classList.add('flex');
                        ">
                            {{-- On affiche la réponse --}}
                            <x-commentaire-reply-display :reply="$reponse" />
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
@endforeach