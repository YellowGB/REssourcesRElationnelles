<div>
    <h2>{{ __('titles.content.title') }} : {{ $content->title }}</h2>
    <p>{{ trans_choice('titles.author', 1) }} : {{ $content->author }}</p>
    <p>{{ __('titles.content.publication') }} : {{ $content->year }}</p>

    <x-sep-horizontal />

    <div class="flex flex-col gap-4 justify-center items-center text-justify">
        <p><span class="underline font-semibold">{{ __('titles.content.summary') }}</span> : {{ $content->summary }}</p>
        <p><span class="underline font-semibold">{{ __('titles.content.analysis') }}</span> : {{ $content->analysis }}</p>
        <p><span class="underline font-semibold">{{ __('titles.content.review') }}</span> : {{ $content->review }}</p>
    </div>
</div>