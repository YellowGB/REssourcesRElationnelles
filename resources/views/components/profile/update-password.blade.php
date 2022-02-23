<div>
    @props([
        'user',
        'route' => route('profile.password'),
        'title' => __('titles.profile.title.password'),
        'desc'  => __('titles.profile.desc.password'),
    ])
    <x-form-section
        :title="$title"
        :route="$route"
        :description="$desc"
    >

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('titles.form.pwdcurrent') }}" />
            <x-input
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                required
            />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('titles.form.pwdnew') }}" />
            <x-input
                name="password"
                type="password"
                class="mt-1 block w-full"
                required
            />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('titles.form.pwdconfirm') }}" />
            <x-input
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                required
            />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
    
    </x-form-section>
</div>