<div
    id="defi"
    class="flex-col w-11/12 lg:w-screen lg:max-w-screen-sm ressource-content"
    style="display: none;"
>
    <textarea
        name="defi_description"
        rows="10"
        placeholder="{{ __('titles.content.description') }}"
    >{{ $content->description ?? '' }}</textarea>
    <textarea
        name="defi_bonus"
        rows="5"
        placeholder="{{ __('titles.content.bonus') }}"
        class="mt-1"
    >{{ $content->bonus ?? '' }}</textarea>
</div>