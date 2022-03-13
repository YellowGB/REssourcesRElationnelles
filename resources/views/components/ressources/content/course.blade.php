<div>
    {{-- <form action="{{ route('courses.show', ['id' => $content->id]) }}">
        <input type="submit" value="{{ __('titles.readfile') . ' ' . $content->file_name }}" class="cursor-pointer">
    </form> --}}

    <div id="pdf-viewer"></div>

    <style>
        .pdfobject-container {
            height: 100vh;
        }
    </style>

    {{-- Documentation : https://pdfobject.com/ --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>
    <script>
        PDFObject.embed("{{ route('courses.show', ['id' => $content->id]) }}", "#pdf-viewer");
    </script>
</div>