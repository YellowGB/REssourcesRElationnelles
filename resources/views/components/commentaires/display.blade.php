<div>
    <b>{{ $commentateur }}</b>
    <p>{{ $commentaire->content }}</p>
    <i>{{ $horodatage }}</i>
    @can('publish-ressources')
        <p><i>{{ $reports }}</i></p>
    @endcan
</div>