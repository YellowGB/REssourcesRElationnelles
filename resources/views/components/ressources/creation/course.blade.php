<div
    id="course"
    class="flex-col w-128 lg:w-screen lg:max-w-screen-sm ressource-content"
    style="display: none;"
>
    <label for="course_file">{{ __('Select the file you wish to upload') }}</label>
    <input
        type="file"
        name="course_file"
        accept=".pdf"
        class=""
    >
    {{-- @edit($content)
        <label for="course_file_name" class="dark:text-gris-light">{{ __('titles.link.current') }}</label>
        <input type="text" name="course_file_name" placeholder="{{ __('titles.filename') }}" value="{{ $content->file_name ?? '' }}" disabled></input>
    @endedit --}}
</div>