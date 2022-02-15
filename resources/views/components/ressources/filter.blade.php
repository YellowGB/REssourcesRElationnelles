<div>
    <script>
        let typeFilter = function() {
            return {
                types : @json($reverse_types),
                selectedTypes: [],
                toggleType(type) {
                    if (this.selectedTypes.indexOf(type) > -1) {
                        this.selectedTypes = this.selectedTypes.filter(t => t !== type)
                    }
                    else {
                        this.selectedTypes.push(type)
                    }
                    console.log(this.selectedTypes.indexOf(type));
                }
            }
        }
    </script>
    <x-dropdown align="left" width="48" keepOpenClickInside="true">
        <x-slot name="trigger">
            <button class="flex items-center p-2 rounded-full border-2 border-noir hover:bg-slate-500 hover:border-gray-500 focus:outline-none focus:bg-slate-500 focus:border-gray-500 transition duration-150 ease-in-out">
                <x-icons.filter />
            </button>
        </x-slot>

        <x-slot name="content">
            <ul
                x-data="typeFilter()"
                class="px-4 py-2 text-sm leading-5 text-gris-dark transition duration-150 ease-in-out"
            >
                <template x-for="type in types">
                    <li>
                        <input
                            type="checkbox"
                            x-bind:name="type"
                            x-bind:id="type"
                            class="mr-1"
                            @click="toggleType(type)"
                        >
                        <span x-text="type" style="color: black" />
                    </li>
                </template>
            </ul>
        </x-slot>

        {{-- <x-slot name="content">
            <ul class="px-4 py-2 text-sm leading-5 text-gris-dark transition duration-150 ease-in-out">
                @foreach ($types as $type)
                    <li>
                        <input
                            type="checkbox"
                            name="{{ $reverse_types[$type] }}"
                            class="mr-1"
                            x-on:click="Livewire.emit('filterRessources', {'ressourceable_type': '{{ $reverse_types[$type] }}'});"
                        >
                        {{ __('titles.type.' . $type) }}
                    </li>
                @endforeach
            </ul>
        </x-slot> --}}
    </x-dropdown>
</div>