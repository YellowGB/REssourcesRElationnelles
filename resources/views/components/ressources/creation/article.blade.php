<div
    id="article"
    class="flex-col w-11/12 lg:w-screen lg:max-w-screen-sm ressource-content"
    style="display: none;"
>
    <input
        type="text"
        name="article_source_url"
        placeholder="{{ __('titles.create.link') }}"
        value="{{ $content->source_url ?? '' }}"
    />
</div>