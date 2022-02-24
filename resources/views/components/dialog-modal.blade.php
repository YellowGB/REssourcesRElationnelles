<div
    x-data="{ showDialogModal: false }"
    class="container flex justify-center mx-auto"
>
    <div class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
        <div class="max-w-sm p-6 bg-blanc dark:bg-slate-700 border-2">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">Modal Title</h3>
                <x-icons.cross class="cursor-pointer" />
            </div>
            <div class="mt-4">
                <p class="mb-4 text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus
                    qui
                    nihil laborum
                    quaerat blanditiis nemo explicabo voluptatum ea architecto corporis quo vitae, velit
                    temporibus eaque quisquam in quis provident necessitatibus.</p>
                <x-danger-button>Cancel</x-danger-button>
                <x-safe-button>Save</x-safe-button>
            </div>
        </div>
    </div>
</div>