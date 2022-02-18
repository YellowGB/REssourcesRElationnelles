<div class="block lg:hidden pl-4">
    <x-dropdown align="left" width="48" keepOpenClickInside="true">
        <x-slot name="trigger">
            <button class="flex items-center p-2 rounded-full border-2 border-noir hover:bg-slate-500 hover:border-gray-500 focus:outline-none focus:bg-slate-500 focus:border-gray-500 transition duration-150 ease-in-out">
                <x-icons.filter />
            </button>
        </x-slot>

        <x-slot name="content">
            <x-ressources.checklist-types />
        </x-slot>
    </x-dropdown>
</div>