<div
    id="photo"
    class="flex-col w-11/12 lg:w-screen lg:max-w-screen-sm ressource-content"
    style="display: none;"
>
    <input type="file" name="photo_file" accept="image/*" value="{{ $content->file_uri ?? '' }}">

    <div class="flex flex-row gap-1 self-center mt-1">
        <div class="flex flex-col place-items-center mb-1">
            <input type="text" name="photo_author" placeholder="{{ trans_choice('titles.author', 1) }}" value="{{ $content->photo_author ?? '' }}"/>
        </div>
        <div class="flex flex-col place-items-center">
            <input type="text" name="photo_legend" placeholder="{{ __('titles.content.legend') }}" value="{{ $content->legend ?? '' }}"/>
        </div>
    </div>
</div>