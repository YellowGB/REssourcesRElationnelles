<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@lang('titles.site')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="flex justify-center min-h-screen bg-blanc dark:bg-noir sm:items-center py-4 sm:pt-0">
            <x-nav-auth />

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8">
                    <x-logos.app-main class="w-11/12 h-1/3" />
                </div>

                <x-nav-auth :mobile="true" />

                <div class="mt-8 bg-blanc dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('catalogue') }}" class="underline text-gray-900 dark:text-blanc">@lang('titles.section.catalogue' )</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Consulter notre catalogue de ressources.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('resources.create') }}" class="underline text-gray-900 dark:text-blanc">@lang('titles.create.ressource')</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    @lang('titles.create.ressource').
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-center sm:justify-between items-center py-4 mx-2 md:mx-0">
                    <a href="https://solidarites-sante.gouv.fr/"><x-logos.ministere /></a>
                    <a href="#"><x-logos.websh /></a>
                </div>

                <ul class="flex flex-col md:flex-row justify-around items-center text-sm">
                    <li>
                        <a href="{{ route('legal') }}">@lang('titles.section.legal')</a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}">@lang('titles.section.privacy')</a>
                    </li>
                    <li>
                        <a href="{{ route('map') }}">@lang('titles.section.map')</a>
                    </li>
                </ul>

                <p class="text-center my-2">
                    &copy; {{ date('Y') }} {{ config('app.name') }}, @lang('All rights reserved.')
                </p>

                {{-- @modo --}}
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        {{ config('app.name') }} v{{ config('app.version') }} - Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                {{-- @endmodo --}}
            </div>
        </div>
    </body>
</html>
