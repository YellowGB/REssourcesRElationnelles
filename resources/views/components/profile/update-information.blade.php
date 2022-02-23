<div>
    @props([
        'user',
        'route' => route('profile.update'),
        'title' => __('titles.profile.title.information'),
        'desc'  => __('titles.profile.desc.information'),
    ])
    <x-form-section
        :title="$title"
        :route="$route"
        :description="$desc"
    >

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            {{-- <input
                type="file"
                class="hidden"
                ref="avatar"
            >

            <x-label for="avatar" value="{{ __('titles.profile.avatar') }}" /> --}}

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                @if ($user->avatar === 'default')
                    <x-icons.avatar class="rounded-full h-20 w-20 object-cover" />
                @else
                    <img src="{{ asset($user->avatar) }}" alt="{{ get_user_display_name($user) }}" class="rounded-full h-20 w-20 object-cover">
                @endif
            </div>

            <!-- New Profile Photo Preview -->
            {{-- <div class="mt-2" v-show="photoPreview">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                      :style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                Select A New Photo
            </jet-secondary-button>

            <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                Remove Photo
            </jet-secondary-button> --}}

        </div>

        <!-- Nom -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('titles.form.name') }}" />
            <x-input
                name="name"
                type="text"
                class="mt-1 block w-full"
                value="{{ $user->name ?? '' }}"
                autocomplete="on"
            />
        </div>

        <!-- Prénom -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="firstname" value="{{ __('titles.form.firstname') }}" />
            <x-input
                name="firstname"
                type="text"
                class="mt-1 block w-full"
                value="{{ $user->firstname ?? '' }}"
                autocomplete="on"
            />
        </div>

        <!-- Pseudonyme -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="nickname" value="{{ __('titles.form.nickname') }}" />
            <x-input
                name="nickname"
                type="text"
                class="mt-1 block w-full"
                value="{{ $user->nickname ?? '' }}"
                autocomplete="on"
            />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('titles.form.email') }}" />
            <x-input
                name="email"
                type="email"
                class="mt-1 block w-full"
                value="{{ $user->email ?? '' }}"
                autocomplete="on"
            />
        </div>

        <!-- Description -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('titles.form.bio') }}" />
            <x-input
                name="description"
                type="text"
                class="mt-1 block w-full"
                value="{{ $user->description ?? '' }}"
                autocomplete="on"
            />
        </div>

        <!-- Code postal -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="postcode" value="{{ __('titles.form.postcode') }}" />
            <x-input
                name="postcode"
                type="text"
                class="mt-1 block w-full"
                value="{{ $user->postcode ?? '' }}"
                autocomplete="on"
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