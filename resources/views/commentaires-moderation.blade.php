<x-app-layout>

    <h2>{{ __('titles.section.comments') . ' ' . __('titles.comment.reported') }}</h2>
    @foreach ($commentaires as $commentaire)
    {{-- {{ dd($commentaire->user_id); }} --}}
        <div 
        onclick="location.href='{{ route('resources.show', ['id' => $commentaire->ressource_id]) }}'"
        class="max-w-md lg:max-w-4xl px-10 py-6 mx-auto my-4 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md cursor-pointer"
        >
            <p>{{ $commentaire->content }}</p>
            <h2>{{ __('titles.by')  }} : {{ $commentaire->user->firstname }} {{ $commentaire->user->name }}</h2>
            <h2>{{ __('titles.section.resource') }} : {{ $commentaire->ressource->title }}</h2>
            <p>{{ __(trans_choice('titles.comment.reports', $commentaire->reports)) }} : {{ $commentaire->reports }}</p>
            <form action="{{ route('comment.moderation', $commentaire->id) }}">
                <input class="cursor-pointer" type="submit" value="{{ __('titles.moderation.commentaire') }}" />
            </form>
        </div>
    @endforeach

</x-app-layout>
