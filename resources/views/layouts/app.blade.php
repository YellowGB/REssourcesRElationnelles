<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,500;0,700;0,800;0,900;1,500&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>[x-cloak] { display: none !important; }</style> <!-- https://alpinejs.dev/directives/cloak -->
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased {{ get_user_theme() }}">
        <div class="min-h-screen bg-gray-100 dark:bg-slate-600">
            
            <x-navigation-layout />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-blanc dark:bg-noir shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot ?? '' }}
            </main>

            <footer class="bg-blanc dark:bg-noir shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <x-nav-footer />
                </div>
            </footer>
        </div>
        @livewire('livewire-ui-modal')
        @livewireScripts
    </body>
</html>
