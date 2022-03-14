<div class="flex flex-col justify-center items-center">
    @if (empty($content->link))
        {{-- <p>{{ __('titles.link.uri') }} : {{ $content->file_uri }}</p> --}}
        <video controls class="w-full lg:w-2/3 rounded-lg">
            <source src="{{ asset($content->file_uri) }}" type="video/mp4">
            {{-- <p>
                Votre navigateur ne prend pas en charge les vidéos HTML5.
                Voici <a href="{{ asset('storage/' . $content->file_uri) }}">un lien pour télécharger la vidéo</a>.
            </p> --}}
        </video>
    @else
        <p>{{ __('titles.link.link') }} : {{ $content->link }}</p>
    @endif
    @if (! is_null($content->legend))
        <p><i>{{ __('titles.content.legend') }} : {{ $content->legend }}</i></p>
    @endif
</div>