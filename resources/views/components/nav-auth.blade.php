<div>
    @props(['mobile' => false])

    @if (Route::has('login'))
        <div class="{{ $mobile ? 'block text-center' : 'hidden fixed top-0 right-0' }} px-6 py-4 sm:{{ $mobile ? 'hidden' : 'block' }}">
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    @lang('titles.section.dashboard')
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    @lang('titles.section.login')
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                        @lang('titles.section.register')
                    </a>
                @endif
            @endauth
        </div>
    @endif
</div>