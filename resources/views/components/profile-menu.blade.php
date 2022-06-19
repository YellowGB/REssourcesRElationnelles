<div class="text-right">
    @auth
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

         <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                this.closest('form').submit();"
            >
                {{ __('Log Out') }}
            </a>
        </form>
    @else
        @if (Route::has('login'))
            <div class="hidden sm:flex flex-col">
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    {{ __('titles.section.login') }}
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                        {{ __('titles.section.register') }}
                    </a>
                @endif
            </div>
        @endif
    @endauth
</div>