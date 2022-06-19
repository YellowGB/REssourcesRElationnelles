<x-app-layout>
    <x-page-header heading=" {{ __('titles.create.admin') }}" />
    <x-triptyque>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="mt-4 flex flex-col sm:justify-center items-center" method="POST" action="{{ route('admin.store') }}">
            @csrf

            <!-- Admin type -->
            <div class="mt-4 mr-21">
                <x-label value="{{ __('titles.form.role') }}"/>
                <select name="role">
                    <option value="{{ App\Models\Role::where('name', 'moderateur')->first()->id; }}">{{ __('titles.role.' . App\Enums\UserRole::Moderator->value) }}</option>
                    <option value="{{ App\Models\Role::where('name', 'administrateur')->first()->id; }}">{{ __('titles.role.' . App\Enums\UserRole::Admin->value) }}</option>
                    @auth
                        @can('delete-users')
                            <option value="{{ App\Models\Role::where('name', 'superadministrateur')->first()->id; }}">{{ __('titles.role.' . App\Enums\UserRole::SuperAdmin->value) }}</option>
                        @endcan
                    @endauth
                </select>
            </div>

            <!-- Name -->
            <div class="mt-2">
                <x-label for="name" :value="__('titles.form.name')" />

                <x-input type="text" name="name" required autofocus />
            </div>

            <!-- Firstname -->
            <div class="mt-2">
                <x-label for="firstname" :value="__('titles.form.firstname')" />

                <x-input type="text" name="firstname" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('titles.form.email')" />

                <x-input type="email" name="email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('titles.form.password')" />

                <x-input type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('titles.form.pwdconfirm')" />

                <x-input type="password" name="password_confirmation" required />
            </div>

            <!-- Postcode -->
            <div class="mt-4">
                <x-label for="postcode" :value="__('titles.form.postcode')" />

                <x-input type="text" name="postcode" required />
            </div>

            <div class="mt-4 ml-43">
                <x-button>
                    {{ __('titles.btn.create') }}
                </x-button>
            </div>
        </form>

    </x-triptyque>
</x-app-layout>