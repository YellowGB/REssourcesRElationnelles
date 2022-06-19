<x-app-layout>
    <x-page-header heading="{{ __('titles.section.citizens') }}" />
    <x-triptyque>
        @foreach ($citoyens as $citoyen)
            <div class="grid grid-cols-1 sm:grid-cols-2 sm:justify-center items-center justify-between">
                <div class="flex justify-between items-center">
                    <p class="text-clip overflow-hidden max-w-md w-1/2 lg:w-full px-10 py-5 my-2 ml-2 mr-3 text-center bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md">
                    {{ $citoyen->firstname }}
                    {{ $citoyen->name }}

                    <form action="{{ route('citizens.suspend', ['id' => $citoyen->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <button type="submit" class="ml-4 mr-2 justify-around w-32">
                            {{ is_null($citoyen->suspended_at) ? __('titles.user.suspend') : __('titles.user.unsuspend')  }}
                        </button>
                    </form>
                </div>
                </p>
            </div>
        @endforeach
    </x-triptyque>
</x-app-layout>