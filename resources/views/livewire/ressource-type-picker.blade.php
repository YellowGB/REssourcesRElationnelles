<div class="grid grid-cols-3 gap-4 justify-items-center p-4">
    @foreach ($types as $kType => $vType)
        <div
            wire:click="$emit('RessourceTypeSelected', '{{ addslashes($vType) }}')"
            class="cursor-pointer"
        >
            <x-dynamic-component :component="'icons.'.$kType" />
        </div>
    @endforeach
</div>
