<div>
    {{-- <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p> --}}
    <img src="{{ asset('storage/' . $content->file_uri) }}" alt="{{ __('titles.type.photo') }}">
    @if (! is_null($content->photo_author))
        <p>{{ trans_choice('titles.author', 1) }} : {{ $content->photo_author }}</p>
    @endif
    @if (! is_null($content->legend))
        <p>{{ __('titles.content.legend') }} : {{ $content->legend }}</p>
    @endif
</div>