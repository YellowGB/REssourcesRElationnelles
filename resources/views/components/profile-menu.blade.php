<div class="text-right">
    <div class="flex justify-end">
        <button class="flex items-center p-2 rounded-full border-2 border-noir cursor-default">
            <x-icons.avatar />
        </button>
    </div>
    <ul>
        <li>{{ get_user_display_name(auth()->user()) }}</li>
        <li>{{ auth()->user()->email }}</li>
        <li><a href="{{ route('profile') }}">
            {{ __('titles.section.profile') }}
        </a></li>
    </ul>
    <hr class="my-2">
    {{-- Theme icon --}}
    <div class="flex justify-end">
        <x-togglers.theme />
    </div>
    <hr class="my-2">
    <a href="{{ route('logout') }}">{{ __('Log Out') }}</a>
</div>