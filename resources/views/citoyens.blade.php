<x-app-layout>
    <x-page-header heading="{{ __('titles.section.users') }}" />
    @foreach ($citoyens as $citoyen)
    <div class="grid grid-cols-1 sm:grid-cols-2 sm:justify-center md:grid-cols-3 items-center justify-between">
        <p class="text-clip overflow-hidden max-w-md px-10 py-5 my-2 ml-2 mr-3 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md">
            {{ $citoyen->name }}
            {{ $citoyen->firstname }}
            <div class="flex">
                <form action="{{ route('citoyens.suspend', ['id' => $citoyen->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                    <button type="submit" class="ml-4 mr-2 justify-around w-32">
                        {{ is_null($citoyen->suspended_at) ? __('titles.user.suspend') : __('titles.user.unsuspend')  }}
                    </button>
                </form>

            </div>
        </p>
    </div>
    @endforeach
</x-app-layout>