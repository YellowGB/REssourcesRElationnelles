<div class="pl-4">
    <x-dropdown align="left" width="48" keepOpenClickInside="true">
        <x-slot name="trigger">
            <button class="flex items-center p-2 rounded-full border-2 border-noir hover:bg-slate-500 hover:border-gray-500 focus:outline-none focus:bg-slate-500 focus:border-gray-500 transition duration-150 ease-in-out">
                <x-icons.filter />
            </button>
        </x-slot>

        <x-slot name="content">
            <ul class="px-4 py-2 text-sm leading-5 text-gris-dark transition duration-150 ease-in-out">
                @foreach ($reverse_types as $type)
                    <li>
                        <input
                            type="checkbox"
                            name="{{ $type }}"
                            class="li-type mr-1"
                            onclick="toggleType('{{ $type }}')"
                            checked
                            {{-- x-on:click="Livewire.emit('filterRessources', {'ressourceable_type': '{{ $reverse_types[$type] }}'});" --}}
                        >
                        {{ __('titles.type.' . $type) }}
                    </li>
                @endforeach
            </ul>
        </x-slot>
    </x-dropdown>
</div>