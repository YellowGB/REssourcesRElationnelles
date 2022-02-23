<x-app-layout>
    <x-page-header heading="{{ __('titles.section.profile') }}" />

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                {{-- <update-profile-information-form :user="$page.props.user" /> --}}
                <x-profile.update-information :user="$user" />

                <x-sep-horizontal />
            </div>

            <div>
                <update-password-form class="mt-10 sm:mt-0" />

                <x-sep-horizontal />
            </div>

            <div>
                <two-factor-authentication-form class="mt-10 sm:mt-0" />

                <x-sep-horizontal />
            </div>

            <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

            <template>
                <x-sep-horizontal />

                <delete-user-form class="mt-10 sm:mt-0" />
            </template>
        </div>
    </div>

</x-app-layout>