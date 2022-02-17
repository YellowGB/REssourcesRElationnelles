<x-app-layout>

    <x-page-header heading="{{ __('titles.section.category') }}" />

    <div class="flex flex-col items-center justify-between">

        @foreach ($categories as $categorie)
            <p class="max-w-md lg:max-w-4xl px-10 py-6 mx-auto my-4 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md">
                @lang('titles.category.' . $categorie->name)
            </p>
        @endforeach

        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="text" name="name">
                <button type="submit" class="mt-4">
                    {{ __('titles.btn.create') }}
                </button>
        </form>
    </div>


</x-app-layout>