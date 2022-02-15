<x-app-layout>

    <h2>{{ __('titles.section.comments') . ' ' . __('titles.comment.reported') }}</h2>
    @foreach ($commentaires as $commentaire)
        <div class="">
            {{-- <h3>{{ $commentaire->ressource_id->title }}</h3> --}}
            {{-- <p> {{ __('titles.by')  }} : {{ $commentaire->user_id->name }}</p> --}}
            <p>{{ $commentaire->content }}</p>
            <p>{{ $commentaire->ressource_id }}</p>
            <p>{{ $commentaire->reports }}</p>
            <form action="{{ route('comment.moderation', $commentaire->id) }}">
                <input type="submit" value="{{ __('titles.moderation.commentaire') }}" />
            </form>
        </div>
    @endforeach

</x-app-layout>