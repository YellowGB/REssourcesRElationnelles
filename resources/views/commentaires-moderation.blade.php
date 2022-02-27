<x-app-layout>

    <x-page-header heading="{{ __('titles.section.comments') . ' ' . __('titles.comment.reported') }}" />
    @foreach ($commentaires as $commentaire)
    {{-- {{ dd($commentaire->user_id); }} --}}
        <div 
        onclick="location.href='{{ route('resources.show', ['id' => $commentaire->ressource_id]) }}'"
        class="max-w-md lg:max-w-4xl px-10 py-6 mx-auto my-4 bg-violet-lightest dark:bg-violet-light rounded-lg shadow-md cursor-pointer"
        >
            <h2>{{ $commentaire->content }}</h2>
            <h3>{{ __('titles.by')  }} : {{ $commentaire->user->firstname }} {{ $commentaire->user->name }}</h3>
            <p>{{ __('titles.section.resource') }} : {{ $commentaire->ressource->title }}</p>
            <p>{{ __(trans_choice('titles.comment.reports', $commentaire->reports)) }} : {{ $commentaire->reports }}</p>
            <form action="{{ route('comment.ignorer', $commentaire->id) }}" method='POST'>
                @csrf
                <input type="submit" value="{{ __('titles.comment.ignore') }}" />
            </form>
            <form action="{{ route('comment.supprimer', $commentaire->id) }}" method='POST'>
                @csrf
                <input type="submit" value="{{ __('titles.comment.delete') }}" />
            </form>
        </div>
    @endforeach

</x-app-layout>
