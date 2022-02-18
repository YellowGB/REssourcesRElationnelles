<x-app-layout>

    <h2>{{ __('titles.section.comments') . ' ' . __('titles.comment.reported') }}</h2>
    @foreach ($commentaires as $commentaire)
    {{-- {{ dd($commentaire->user_id); }} --}}
        <div class="">
            <p>{{ __('titles.section.resource') }} : {{ $commentaire->ressource->title }}</p>
            <p> {{ __('titles.by')  }} : {{ $commentaire->user->firstname }} {{ $commentaire->user->name }}</p>
            <p>{{ $commentaire->content }}</p>
            <p>{{ $commentaire->ressource_id }}</p>
            <p>{{ $commentaire->reports }}</p>
            <form action="{{ route('comment.moderation', $commentaire->id) }}">
                <input type="submit" value="{{ __('titles.moderation.commentaire') }}" />
            </form>
        </div>
        <x-sep-horizontal />
    @endforeach

</x-app-layout>
