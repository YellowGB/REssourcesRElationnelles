<x-app-layout>
    <x-page-header heading="{{ trans_choice('titles.section.category', 2) }}" />
    <x-triptyque>
        <div class="grid grid-cols-1 sm:grid-cols-2 justify-between sm:justify-center md:grid-cols-3 items-center text-center">

            @foreach ($categories as $categorie)
                <p class="text-clip overflow-hidden max-w-md lg:max-w-4xl w-8/12 p-5 mx-auto my-2 lg:mt-6 ml-4 md:ml-5 md:my-1 md:mt-2 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md">
                    @lang('titles.category.' . $categorie->name)
                </p>
            @endforeach
        </div>
        <div class="flex justify-center my-2 mt-4">
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="mt-4 ml-4">
                <button type="submit" class="w-40 mt-4 ml-4">
                    {{ __('titles.btn.create') }}
                </button>
        </form>
    </x-triptyque>
</x-app-layout>