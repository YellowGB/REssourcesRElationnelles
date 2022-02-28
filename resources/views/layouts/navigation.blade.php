<nav x-data="{ open: false }" class="bg-blanc dark:bg-noir border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-logos.app-nav class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="dark:text-slate-300 dark:hover:text-blanc" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('titles.section.dashboard') }}
                    </x-nav-link>
                    <x-nav-link class="dark:text-slate-300 dark:hover:text-blanc" :href="route('catalogue')" :active="request()->routeIs('catalogue')">
                        {{ __('titles.section.catalogue') }}
                    </x-nav-link>
                    <x-nav-link class="dark:text-slate-300 dark:hover:text-blanc" :href="route('resources.create')" :active="request()->routeIs('resources.create')">
                        {{ __('titles.create.ressource') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <a href="{{ route('profile') }}">
                    <button class="flex items-center p-2 rounded-full border-2 border-noir hover:bg-slate-500 hover:border-gray-500 focus:outline-none focus:bg-slate-500 focus:border-gray-500 transition duration-150 ease-in-out">
                        {{-- créer directive blade @avatar, corriger la valeur par défaut d'avatar --}}
                        <x-icons.avatar />
                    </button>
                </a> 

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('titles.section.dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('catalogue')" :active="request()->routeIs('catalogue')">
                {{ __('titles.section.catalogue') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('resources.create')" :active="request()->routeIs('resources.create')">
                {{ __('titles.create.ressource') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gris-normal">{{ get_user_display_name(Auth::user()) }}</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gris-light">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                        {{ __('titles.section.profile') }}
                    </x-responsive-nav-link>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                @if (Route::has('login'))
                    <div class="mt-3 space-y-1">
                        @auth
                            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('titles.section.dashboard') }}
                            </x-responsive-nav-link>
                        @else
                            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                {{ __('titles.section.login') }}
                            </x-responsive-nav-link>

                            @if (Route::has('register'))
                                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                    {{ __('titles.section.register') }}
                                </x-responsive-nav-link>
                            @endif
                        @endauth
                    </div>
                @endif
            @endauth
        </div>
    </div>
</nav>
