<x-app-layout>
    <x-page-header heading="{{ __('titles.section.profile') }}" />

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif

            <div>
                <x-profile.update-information :user="$user" />

                <x-sep-horizontal class="w-full lg:w-full" />
            </div>

            <div>
                <x-profile.update-password class="mt-10 sm:mt-0" />

                <x-sep-horizontal class="w-full lg:w-full" />
            </div>

            <div>
                <x-profile.delete-user class="mt-10 sm:mt-0" />
            </div>
        </div>
    </div>

</x-app-layout>