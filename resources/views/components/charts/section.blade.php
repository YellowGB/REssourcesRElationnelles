@props(['section' => ''])
<div
    @click="hideAll(); {{ $section }} = true; showSections = false;"
    class="
        w-full border-y py-2 border-gris-normal hover:bg-primaire hover:text-blanc text-center
        md:-rotate-45 md:py-12 md:text-lg 2xl:text-xl md:w-[50vw] md:border-none md:hover:translate-x-2 2xl:hover:translate-x-4 md:hover:-translate-y-2 2xl:hover:-translate-y-4 md:hover:font-bold
    "
    :class="{ 'bg-primaire text-blanc md:translate-x-2 2xl:translate-x-4 md:-translate-y-2 2xl:-translate-y-4 md:font-bold': {{ $section }} == true }"
>
    {{ $slot }}
</div>