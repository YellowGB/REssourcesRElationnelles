@props(['section' => ''])
<div
    @click="hideAll(); {{ $section }} = true; showSections = false;"
    class="w-full border-y py-2 border-gris-normal hover:bg-primaire hover:text-blanc text-center"
    :class="{ 'bg-primaire text-blanc': {{ $section }} == true }"
>
    {{ $slot }}
</div>