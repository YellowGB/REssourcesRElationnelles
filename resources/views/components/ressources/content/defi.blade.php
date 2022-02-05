<div>
    <h3>{{ __('titles.content.description') }}</h3>
    <p>{{ $content->description }}</p>
    @if (! is_null($content->bonus))
        <h4>{{ __('titles.content.bonus') }}</h4>
        <p>{{ $content->bonus }}</p>
    @endif
</div>