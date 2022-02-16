<div class="grid grid-cols-1 lg:grid-cols-catalogue gap-4 justify-items-stretch items-stretch">
    {{-- Le premier div sert uniquement à conserver l'espace de la première colonne de la grid, donnant la possibilité au prochain div d'être fixed sans casser le layout de la page --}}
    <div>
        <div class=
            "
            bg-gris-normal
            {{-- La barre de navigation fait constamment 64px de hauteur + 104px pour le header --}}
            fixed
            top-44
            hidden
            lg:flex
            flex-col
            mt-2
            ml-4
            xl:ml-8
            h-60
            w-44
            xl:w-60
            overflow-x-hidden
            rounded-md
            transition-all
            "
            x-data="{ atTop: true }" 
            :class="{ 'top-44' : atTop, 'top-10' : !atTop }"
            @scroll.window="atTop = (window.pageYOffset > 80) ? false : true"
        >
            <x-ressources.checklist-types />
        </div>
    </div>
    <div>
        {{ $slot }}
    </div>
</div>