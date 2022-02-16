<x-app-layout>

    <x-page-header heading="{{ __('titles.section.category') }}" />

    <div class="flex flex-col lg:w-2/3 place-items-center">

        @foreach ($categories as $categorie)
            <p class="bg-light">
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