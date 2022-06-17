<div>
    <div class="flex items-center justify-between mt-2 md:hidden">
        <x-ressources.card-type :title="__('titles.relation.' . $ressource->relation)" />
        <x-ressources.card-type :title="__('titles.category.' . $ressource->categorie->name)" />
    </div>
    <div class="flex gap-2 my-4" x-data>
        {{-- Edition --}}
        @can('update-ressources', $ressource)
            <form x-ref="editForm" action="{{ route('resources.edit', ['id' => $ressource->id]) }}">
                <x-icons.pencil-alt
                    :title="__('titles.edit.ressource')"
                    @click="$refs.editForm.submit()"
                    class="resource-interactions h-8 w-8 mr-4"
                />
            </form>
        @endcan
        <x-ressources.actions :favorite="$progress['is_favorite']" :used="$progress['is_used']" :saved="$progress['is_saved']" class="resource-interactions sm:hidden" />
    </div>
</div>