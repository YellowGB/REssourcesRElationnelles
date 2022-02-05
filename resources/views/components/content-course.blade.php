<div>
    {{-- <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p> --}}
    {{-- <p>{{ __('titles.filename') }} : {{ $content->file_name }}</p> --}}
    <form action="{{ route('courses.show', ['id' => $content->id]) }}">
        <input type="submit" value="{{ __('titles.readfile') . ' ' . $content->file_name }}">
    </form>
</div>