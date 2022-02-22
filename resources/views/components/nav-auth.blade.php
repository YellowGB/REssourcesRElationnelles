<div>
    @props(['mobile' => false])

    @if (Route::has('login'))
        <div class="{{ $mobile ? 'block text-center' : 'hidden fixed top-0 right-0' }} px-6 py-4 sm:{{ $mobile ? 'hidden' : 'block' }}">
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm bg-gray-700 dark:bg-gray-300 text-gray-300 dark:text-gray-700 py-1 px-2 rounded-sm hover:bg-gray-800">
                    @lang('titles.section.dashboard')
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm bg-gray-700 dark:bg-gray-300 text-gray-300 dark:text-gray-700 py-1 px-2 rounded-sm hover:bg-gray-800">
                    @lang('titles.section.login')
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm bg-gray-600 dark:bg-gray-200 text-gray-200 dark:text-gray-600 py-1 px-2 rounded-sm hover:bg-gray-700">
                        @lang('titles.section.register')
                    </a>
                @endif
            @endauth
        </div>
    @endif
</div>