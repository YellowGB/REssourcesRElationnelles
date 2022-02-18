<x-app-layout>
    <x-page-header heading="{{ __('titles.section.users') }}" />
    @foreach ($citoyens as $citoyen)
    <p class="max-w-md lg:max-w-1xl px-10 py-4 mx-auto my-2 ml-4 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md">
        {{ $citoyen->name }}
        {{ $citoyen->firstname }}
        <div class="flex">
            <button onClick="" class="ml-4 mr-2 justify-around w-32">On</button>
            <button onClick="" class="ml-4 mr-2 justify-around w-32">Off</button>
        </div>
    </p>
    @endforeach
</x-app-layout>