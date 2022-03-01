<div>
    <h2>@lang('titles.section.lang')</h2>
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="ml-2">
                <a
                    rel="alternate"
                    hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                    class="dark:text-violet-lighter dark:hover:text-violet-lightest"
                >
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>