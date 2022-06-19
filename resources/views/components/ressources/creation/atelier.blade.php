<div
    id="atelier"
    class="flex-col w-11/12 lg:w-screen lg:max-w-screen-sm ressource-content"
    style="display: none;"
>
    <textarea
        name="atelier_description"
        rows="10"
        placeholder="{{ __('titles.content.description') }}"
    >{{ $content->description ?? '' }}</textarea>
</div>