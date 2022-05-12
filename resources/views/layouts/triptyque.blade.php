<div class="mx-4 grid grid-cols-1 lg:grid-cols-triptyque gap-4 justify-items-stretch items-stretch min-h-40 lg:min-h-60">
    {{-- Le premier div sert uniquement à conserver l'espace de la première colonne de la grid, donnant la possibilité au prochain div d'être fixed sans casser le layout de la page --}}
    <div>
        {{ $left ?? '' }}
    </div>
    <div>
        {{ $slot }}
    </div>
    <div>
        @if (isset($right))
            {{ $right }}
        @else
            <x-sidebar-section>
                <x-profile-menu />
                </br>
                @livewire('chat-message')
            </x-sidebar-section>
        @endif
    </div>
</div>