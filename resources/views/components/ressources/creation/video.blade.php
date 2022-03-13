<div
    id="video" 
    class="flex-col w-11/12 lg:w-screen lg:max-w-screen-sm ressource-content" 
    style="display: none;"
>
    <input type="file" name="video_file" accept="video/mp4" value="{{ $content->file_uri ?? '' }}">
    
    <div class="flex flex-row gap-1 self-center mt-1">
        <div class="flex flex-col place-items-center mb-1">
            <input type="text" name="video_link" placeholder="{{ __('titles.link.link') }}" value="{{ $content->link ?? '' }}"></input>
        </div>
        <div class="flex flex-col place-items-center">
            <input type="text" name="video_legend" placeholder="{{ __('titles.content.legend') }}" value="{{ $content->legend ?? '' }}"></input>
        </div>
    </div>
</div>