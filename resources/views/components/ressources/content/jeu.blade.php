<div>
    <p class="flex gap-2 mb-4"><x-icons.calendar :title="format_starting_date($content)" />{{ format_starting_date($content, 'simplestart') }}</p>

    <h3>{{ __('titles.content.description') }}</h3>
    <p>{{ $content->description }}</p>
    
    <p class="mt-4">{{ __('titles.link.link') }} : </p>
    <div class="bg-gris-normal rounded-xl border-2 border-gris-dark p-4">
        <a href="{{ $content->link }}" target="_blank">{{ $content->link }}</a>
    </div>
</div>