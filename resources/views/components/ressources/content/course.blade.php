<div>
    <form action="{{ route('courses.show', ['id' => $content->id]) }}">
        <input type="submit" value="{{ __('titles.readfile') . ' ' . $content->file_name }}" class="cursor-pointer">
    </form>
</div>