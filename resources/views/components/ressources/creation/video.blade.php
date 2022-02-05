<div id="video" class="ressource-content" style="display: none;">
    <input type="file" name="video_file" accept="video/mp4" value="{{ $content->file_uri ?? '' }}">
    <input type="text" name="video_link" placeholder="{{ __('titles.link.link') }}" value="{{ $content->link ?? '' }}"></input>
    <input type="text" name="video_legend" placeholder="{{ __('titles.content.legend') }}" value="{{ $content->legend ?? '' }}"></input>
</div>