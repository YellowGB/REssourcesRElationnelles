<div class="grid grid-cols-1 lg:grid-cols-triptyque gap-4 justify-items-stretch items-stretch">
    {{-- Le premier div sert uniquement à conserver l'espace de la première colonne de la grid, donnant la possibilité au prochain div d'être fixed sans casser le layout de la page --}}
    <div>
        {{ $left ?? '' }}
    </div>
    <div>
        {{ $slot }}
    </div>
    <div>
        {{ $right ?? '' }}
    </div>
</div>