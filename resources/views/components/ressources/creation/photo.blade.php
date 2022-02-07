<div id="photo" class="ressource-content" style="display: none;">
    <input type="file" name="photo_file" accept="image/*" value="{{ $content->file_uri ?? '' }}">
    <input type="text" name="photo_author" placeholder="{{ trans_choice('titles.author', 1) }}" value="{{ $content->photo_author ?? '' }}"></input>
    <input type="text" name="photo_legend" placeholder="{{ __('titles.content.legend') }}" value="{{ $content->legend ?? '' }}"></input>
</div>