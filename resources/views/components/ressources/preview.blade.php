<div 
    onclick="location.href='{{ route('resources.show', ['id' => $ressource->id]) }}'"
    class="max-w-md lg:max-w-4xl px-10 py-6 mx-auto my-4 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md cursor-pointer"
>

    <x-ressource-header :ressource="$ressource" />

    <div class="mt-2">
        <h2>{{ $ressource->title }}</h2>
    </div>

    <x-dynamic-component :component="'excerpt-' . $reverse_types[$ressource->ressourceable_type]" :ressource="$ressource" />

    <div class="flex items-center justify-between mt-2">
        <span class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ __('titles.relation.' . $ressource->relation) }}</span>
        <span class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{ __('titles.category.' . $ressource->categorie->name) }}</span>
    </div>
</div>