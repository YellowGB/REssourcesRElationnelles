<div>
    <div class="flex gap-4 mb-4">
        <p class="flex gap-2"><x-icons.calendar :title="format_starting_date($content)" />{{ format_starting_date($content, 'simplestart') }}</p>
        <p class="flex gap-2"><x-icons.clock :title="__('titles.content.duration')" /> {{ $content->duration }}min</p>
    </div>
    <h3>{{ __('titles.content.description') }}</h3>
    <p>{{ $content->description }}</p>
</div>