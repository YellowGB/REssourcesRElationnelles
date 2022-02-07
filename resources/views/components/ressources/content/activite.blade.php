<div>
    <h3>{{ __('titles.content.description') }}</h3>
    <p>{{ $content->description }}</p>
    <p>{{ format_starting_date($content) }}</p>
    <p>{{ __('titles.content.duration') }} : {{ $content->duration }}min</p>
</div>