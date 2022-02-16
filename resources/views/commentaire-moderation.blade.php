<x-app-layout>
    <h2>{{ __('titles.moderation.commentaire') }}</h2>
    {{-- {{ dd($commentaire->id); }} --}}
    <form action="{{ route('comment.ignorer', $commentaire->id) }}" method='POST'>
        @csrf
        <input type="submit" value="{{ __('titles.comment.ignore') }}" />
    </form>
    <form action="{{ route('comment.supprimer', $commentaire->id) }}" method='POST'>
        @csrf
        <input type="submit" value="{{ __('titles.comment.delete') }}" />
    </form>
</x-app-layout>