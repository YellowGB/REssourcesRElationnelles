<div id="course" class="ressource-content" style="display: none;">
    <input type="file" name="course_file" accept=".pdf">
    @edit($content)
        <label for="course_file_name" class="input-title">{{ __('titles.link.current') }}</label>
        <input type="text" name="course_file_name" placeholder="{{ __('titles.filename') }}" value="{{ $content->file_name ?? '' }}" disabled></input>
    @endedit
</div>