<x-app-layout>
    <x-page-header heading="{{ __('titles.section.users') }}" />
    @foreach ($citoyens as $citoyen)
    <p class="max-w-md lg:max-w-1xl px-10 py-5 mx-auto my-2 ml-4 mr-4 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md">
        {{ $citoyen->name }}
        {{ $citoyen->firstname }}
        <div class="flex">
            <form action="{{ route('citoyens.update', ['id' => $citoyen->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
                <button type="submit" class="ml-4 mr-2 justify-around w-32">
                    {{ is_null($citoyen->suspended_at) ? __('titles.user.suspend') : __('titles.user.unsuspend')  }}
                </button>
            </form>

        </div>
    </p>
    @endforeach
</x-app-layout>