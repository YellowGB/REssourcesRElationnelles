<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-blanc leading-tight" id="header">
        {{ htmlspecialchars_decode($heading) }} {{-- sinon les caractères tels que les apostrophes apparaissent encodés --}}
    </h2>
</x-slot>