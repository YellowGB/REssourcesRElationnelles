<div x-data="{ open: true }" class="fixed left-8 bottom-4 w-4/6 md:w-1/5">
    @auth
        @if($groupes)
            <div x-show="open" class="container">
                <h3 class="mt-2 py-1 px-2 bg-primaire text-secondaire">@lang('titles.chat.messages', ['group' => ucfirst($selected_group->name)])</h3>
                <div class="h-2/4">
                    <div
                        x-ref="messages"
                        {{-- On scroll automatiquement jusqu'au dernier message (appelé dans le composant chat-message) --}}
                        x-data="{
                            scrollBottom() {
                                $refs.messages.scrollTop = 999999999;
                            },
                            autoRefresh() {
                                $wire.emit('autoRefresh'); {{-- https://laravel-livewire.com/docs/2.x/alpine-js#alpine-in-livewire --}}
                            }
                        }"
                        x-init="setInterval(autoRefresh, 1000)"
                        class="border-x-2 dark:border-slate-400 p-2 h-[60vh] overflow-y-scroll bg-slate-50 dark:bg-slate-500"
                    >
                        @foreach ($messages as $message)
                            <x-chat-message :message="$message" />
                        @endforeach
                    </div>
                    <div class="border-2 border-t-0 dark:border-slate-400 px-2 bg-slate-50 dark:bg-slate-500">
                        @csrf
                        <form wire:submit.prevent="submit" class="flex items-center gap-1">
                            <input wire:model="message" type="text" class="h-10 w-3/4">
                            <button wire:click="submit" type="button">@lang('titles.chat.send')</button>
                        </form>
                    </div>
                </div>
            </div>
            <div
                x-data="{ showGroups: false }"
                class="z-50 text-slate-400 hover:text-bleu-dark flex gap-2 items-center w-[95vw] h-12"
                :class="{ 'text-bleu-normal': open }"
                @mouseover.away="showGroups = false"
            >
                <x-icons.chat
                    class="h-12 w-12"
                    @click="open = ! open"
                    @mouseover="showGroups = true"
                />
                <div x-show="showGroups" class="flex gap-1" x-transition>
                    @foreach ($groupes as $groupe)
                        <button
                            wire:click="switchgroup({{ $groupe->id }})"
                            type="button"
                            :class="{ 'bg-bleu-normal': {{ $selected_group === $groupe ? 'true' : 'false' }} }"
                        >
                            {{ $groupe->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif
    @endauth
    {{-- Nécessaire de refermer le chat ainsi au chargement de la page plutôt que d'indiquer open: false par défaut
         pour laisser le scrollBottom() s'exécuter une fois avant de fermer le chat,
         sinon lors de l'ouverture le scroll sera en haut sur les messages les plus anciens --}}
    <div x-init="open = false;" class="hidden"></div>
</div>