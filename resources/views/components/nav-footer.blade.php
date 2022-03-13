<ul class="flex flex-col md:flex-row justify-around items-center text-sm">
    <li class="mb-2 md:mb-0">
        <x-logos.small-ministere />
    </li>
    <li>
        <a href="{{ route('legal') }}">@lang('titles.section.legal')</a>
    </li>
    <li>
        <a href="{{ route('privacy') }}">@lang('titles.section.privacy')</a>
    </li>
    <li>
        <a href="{{ route('map') }}">@lang('titles.section.map')</a>
    </li>
    <li class="py-2 md:py-0">
        Réalisation : WeBSH
    </li>
    <li>
        &copy; {{ date('Y') }} {{ config('app.name') }}, @lang('All rights reserved.')
    </li>
</ul>