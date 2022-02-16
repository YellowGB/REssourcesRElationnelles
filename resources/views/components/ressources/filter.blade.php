<div>
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
    <script>
        var selectedTypes = [];

        // Par défaut, au chargement de la page, tous les types sont sélectionnés
        var types = document.getElementsByClassName("li-type");
        for (i = 0; i < types.length; i++) {
            selectedTypes.push(types[i].name);
        }

        // Ajoute/retire un type de la liste et envoie l'évènement de filtrage des ressources
        function toggleType(type) {
            
            if (selectedTypes.indexOf(type) > -1) {
                selectedTypes = selectedTypes.filter(t => t !== type)
            }
            else {
                selectedTypes.push(type)
            }

            Livewire.emit('filterRessources', {'ressourceable_type': selectedTypes});
        }
    </script>
</div>