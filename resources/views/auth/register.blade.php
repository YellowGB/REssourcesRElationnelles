<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-logos.app-main class="w-60 h-60" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('titles.form.name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Firstname -->
            <div class="mt-2">
                <x-label for="firstname" :value="__('titles.form.firstname')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required />
            </div>

            <!-- Nickname -->
            <div class="mt-2">
                <x-label for="nickname" :value="__('titles.form.nickname')" />

                <x-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('titles.form.email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('titles.form.password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('titles.form.pwdconfirm')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-label for="description" :value="__('titles.form.bio')" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
            </div>

            <!-- Postcode -->
            <div class="mt-4">
                <x-label for="postcode" :value="__('titles.form.postcode')" />

                <x-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('titles.btn.register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
