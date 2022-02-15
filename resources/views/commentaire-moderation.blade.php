<x-app-layout>
    <h2>{{ __('titles.moderation.commentaire') }}</h2>
    <form action="{{ route('comments.moderation.ignorer', $commentaire->id) }}" method='POST'>
        @csrf
        <input type="submit" value="{{ __('titles.comment.ignore') }}" />
    </form>
    <form action="{{ route('comments.moderation.supprimer', $commentaire->id) }}" method='POST'>
        @csrf
        <input type="submit" value="{{ __('titles.comment.delete') }}" />
    </form>
</x-app-layout>