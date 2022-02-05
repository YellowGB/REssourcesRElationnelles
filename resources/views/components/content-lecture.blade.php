<div>
    <h2>{{ __('titles.content.title') }} : {{ $content->title }}</h2>
    <p>{{ trans_choice('titles.author', 1) }} : {{ $content->author }}</p>
    <p>{{ __('titles.content.publication') }} : {{ $content->year }}</p>
    <p>{{ __('titles.content.summary') }} : {{ $content->summary }}</p>
    <p>{{ __('titles.content.analysis') }} : {{ $content->analysis }}</p>
    <p>{{ __('titles.content.review') }} : {{ $content->review }}</p>
</div>