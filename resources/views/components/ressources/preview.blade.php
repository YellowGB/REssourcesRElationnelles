<div 
    onclick="location.href='{{ route('resources.show', ['id' => $ressource->id]) }}'"
    class="max-w-md lg:max-w-4xl px-10 py-6 mx-auto my-4 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md cursor-pointer"
>

    <div class="flex items-center justify-between">
        <div>
            <span class="flex items-center">
                {{-- class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" --}}
                <x-user-portrait />
                <h2>{{ get_user_display_name($ressource->user) }}</h2>
            </span>
            {{-- <span class="font-light text-gray-600">{{ format_horodatage($ressource) }}</span> --}}
        </div>
        {{-- On récupère l'icône correspondant au type de ressource (array fournie par AppServiceProvider) --}}
        <div class="group">
            <span class="opacity-0 group-hover:opacity-100 transition-opacity">{{ __('titles.type.' . $ressource->ressourceable_type) }}</span>
            <x-dynamic-component
                :component="'icons.' . $reverse_types[$ressource->ressourceable_type]"
                class="h-10 w-10 inline-block opacity-80 group-hover:opacity-100 dark:text-blanc dark:hover:text-primaire hover:text-primaire hover:rotate-12 transition-transform"
            />
        </div>
    </div>

    <div class="mt-2">
        <h2>{{ $ressource->title }}</h2>
    </div>

    <x-dynamic-component :component="'excerpt-' . $reverse_types[$ressource->ressourceable_type]" :ressource="$ressource" />

    <div class="flex items-center justify-between mt-2">
        <span class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ __('titles.relation.' . $ressource->relation) }}</span>
        <span class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ __('titles.category.' . $ressource->categorie->name) }}</span>
    </div>
</div>