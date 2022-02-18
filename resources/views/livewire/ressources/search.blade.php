<div class="bg-blanc dark:bg-noir shadow">
    <div
        class="flex justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"
        x-data="{ atTop: true }" 
        :class="{ 'justify-between' : atTop, 'justify-center' : !atTop }"
        @scroll.window="atTop = (window.pageYOffset > 80) ? false : true"
    >
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-blanc leading-tight"
            id="header"
            x-data="{ atTop: true }" 
            :class="{ 'hidden' : !atTop }"
            @scroll.window="atTop = (window.pageYOffset > 80) ? false : true"
        >
            {{ __('titles.section.catalogue') }}
        </h2>
        <div
            class="relative"
            x-data="{ atTop: true }" 
            :class="{ 'relative' : atTop, 'fixed top-4 opacity-60' : !atTop }"
            @scroll.window="atTop = (window.pageYOffset > 80) ? false : true"
        >

            <x-icons.search class="absolute text-gray-400 top-5 left-4" />
            
            <input
                type="text"
                class="h-14 w-full px-12 rounded-full focus:outline-none"
                onclick="window.scrollTo({ top:0, left:0, behavior: 'smooth'})"
                wire:model="search_terms"
                wire:keydown.a="search"
                wire:keydown.z="search"
                wire:keydown.e="search"
                wire:keydown.r="search"
                wire:keydown.t="search"
                wire:keydown.y="search"
                wire:keydown.u="search"
                wire:keydown.i="search"
                wire:keydown.o="search"
                wire:keydown.p="search"
                wire:keydown.q="search"
                wire:keydown.s="search"
                wire:keydown.d="search"
                wire:keydown.f="search"
                wire:keydown.g="search"
                wire:keydown.h="search"
                wire:keydown.j="search"
                wire:keydown.k="search"
                wire:keydown.l="search"
                wire:keydown.m="search"
                wire:keydown.w="search"
                wire:keydown.x="search"
                wire:keydown.c="search"
                wire:keydown.v="search"
                wire:keydown.b="search"
                wire:keydown.n="search"
                wire:keydown.enter="search"
                wire:keydown.backspace="search"
                wire:keydown.delete="search"
                wire:keydown.cut="search"
                wire:keydown.paste="search"
                wire:keydown.decimal="search"
                wire:keydown.0="search"
                wire:keydown.1="search"
                wire:keydown.2="search"
                wire:keydown.3="search"
                wire:keydown.4="search"
                wire:keydown.5="search"
                wire:keydown.6="search"
                wire:keydown.7="search"
                wire:keydown.8="search"
                wire:keydown.9="search"
            />

            <span class="absolute top-4 right-5 border-l pl-4"></span>
            
        </div>
    </div>
</div>