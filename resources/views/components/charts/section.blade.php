@props(['section' => ''])
<div @click="hideAll(); {{ $section }} = true" class="w-full border-y border-gris-normal hover:bg-primaire hover:text-blanc text-center">
    {{ $slot }}
</div>