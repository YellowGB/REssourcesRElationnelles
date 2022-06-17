
<h2 class="ml-4">@lang("titles.section.$section")</h2>
@forelse ($progressions as $progression)
    @if (
            ($section === 'myfav' && ! $progression->is_favorite)
        ||  ($section === 'myexploit' && ! $progression->is_used)
        ||  ($section === 'mybookmark' && ! $progression->is_saved)
    )
        @continue {{-- https://laravel.com/docs/8.x/blade#loops --}}
    @endif

    <x-ressource-preview :ressource="$progression->ressource" />

@empty
    <p class="ml-12">@lang('None.')</p>
@endforelse