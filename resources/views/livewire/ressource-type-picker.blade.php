<div>
    <h2 class="text-center my-3">@lang('titles.select.type')</h2>
    <hr class="text-gris-dark dark:text-gris-light">
    <div class="bg-blanc dark:bg-slate-700 grid grid-cols-2 sm:grid-cols-3 gap-8 p-6 mb-4 justify-items-center">
        @foreach ($types as $kType => $vType)
            <div
                wire:click="$emit('RessourceTypeSelected', '{{ addslashes($vType) }}')"
                class="group relative cursor-pointer text-center"
            >
                <x-dynamic-component
                    :component="'icons.'.$kType"
                    class="h-12 w-12 lg:h-14 lg:w-14 opacity-80 group-hover:opacity-100 dark:text-blanc dark:hover:text-primaire hover:text-primaire hover:rotate-12 transition-transform"
                />
                <span class="absolute w-32 h-10 -translate-x-1/2 opacity-0 group-hover:opacity-100 dark:text-blanc transition-opacity font-semibold">
                    @lang('titles.type.' . $vType)
                </span>
            </div>
        @endforeach
    </div>
</div>