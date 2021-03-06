<div class="flex flex-col justify-center items-center">
    <img
        src="{{ asset($content->file_uri) }}"
        alt="{{ __('titles.type.photo') }}"
        class="rounded-lg"
    >
    @if (! is_null($content->legend))
        <p><i>{{ $content->legend }}</i></p>
    @endif
    @if (! is_null($content->photo_author))
        <p class="m-4">{{ trans_choice('titles.author', 1) }} : {{ $content->photo_author }}</p>
    @endif
</div>