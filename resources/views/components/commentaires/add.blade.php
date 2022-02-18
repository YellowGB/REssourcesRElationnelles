<div
    id="{{ isset($commentaire->id) ? 'comment-' . $commentaire->id : '' }}"
    {{ isset($commentaire->id) ? 'hidden' : '' }}
>
    <form method="post" action="{{ route('comment.store', ['id' => $ressource->id, 'commentaire' => $commentaire->id]) }}">
        @csrf
        <input type="text" name="content" placeholder="{{ __('titles.comment.write') }}" min="1" max="255">
        <input type="submit" value="{{ __('titles.comment.add') }}">
    </form>
</div>