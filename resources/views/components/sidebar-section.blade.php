<div {{ $attributes->merge(['class' =>
    '
        bg-blanc
        dark:bg-gris-normal
        {{-- La barre de navigation fait constamment 64px de hauteur + 104px pour le header --}}
        fixed
        top-44
        hidden
        lg:flex
        flex-col
        mt-2
        ml-4
        xl:ml-8
        px-4
        py-2
        w-44
        xl:w-60
        overflow-x-hidden
        rounded-md
        transition-all
    ']) }}
    x-data="{ atTop: true }" 
    :class="{ 'top-44' : atTop, 'top-10' : !atTop }"
    @scroll.window="atTop = (window.pageYOffset > 80) ? false : true"
>
    {{ $slot }}
</div>