<x-app-layout>

    <x-page-header heading="{{ __('titles.section.category') }}" />
    
    @foreach ($categories as $categorie)
        <p>@lang('titles.category.' . $categorie->name)</p>
    @endforeach

    <form action="{{}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col lg:w-2/3 place-items-center">
            <button type="submit" class="mt-4"></button>
        </div>
    </form>

</x-app-layout>