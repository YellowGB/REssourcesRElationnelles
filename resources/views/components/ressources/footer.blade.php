<div>
    <div class="flex items-center justify-between mt-2 md:hidden">
        <span class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ __('titles.relation.' . $ressource->relation) }}</span>
        <span class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ __('titles.category.' . $ressource->categorie->name) }}</span>
    </div>
    <div class="flex gap-2 my-4" x-data>
        {{-- Edition --}}
        @can('update-ressources', $ressource)
            <form x-ref="editForm" action="{{ route('resources.edit', ['id' => $ressource->id]) }}">
                <x-icons.pencil-alt
                    :title="__('titles.edit.ressource')"
                    @click="$refs.editForm.submit()"
                    class="resource-interactions h-8 w-8"
                />
            </form>
        @endcan
        <div id="share" class="flex items-center ml-4">
            <x-icons.share
                :title="__('titles.btn.share')"
                @click="copyToClipboard()"
                class="resource-interactions h-8 w-8 mr-1"
            />
        </div>
        <x-icons.bookmark-empty :title="__('titles.btn.bookmark')" class="resource-interactions h-8 w-8" />
        <x-icons.heart-empty :title="__('titles.btn.favorite')" class="resource-interactions h-8 w-8" />
        <x-icons.flag-empty :title="__('titles.btn.exploit')" class="resource-interactions h-8 w-8" />
    </div>
</div>