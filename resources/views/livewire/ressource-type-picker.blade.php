<div class="grid grid-cols-3 gap-4 place-content-center text-center p-4">
    @foreach ($types as $kType => $vType)
        <div wire:click="$emit('RessourceTypeSelected', '{{ addslashes($vType) }}')">
            <x-dynamic-component :component="'icons.'.$kType" />
            {{-- class="cursor-pointer hover:w-8 hover:h-8" --}}
        </div>
    @endforeach
</div>
