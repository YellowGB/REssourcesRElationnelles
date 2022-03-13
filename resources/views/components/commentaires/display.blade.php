<div class="flex mt-2">
    <x-user-portrait />
    <div class="flex flex-col">
        <div><b>{{ $commentateur }}</b>, <i>{{ $horodatage }}</i></div>
        <p>{{ $commentaire->content }}</p>
        @can('publish-ressources')
            <p class="text-sm"><i>{{ $reports }}</i></p>
        @endcan
        {{ $slot ?? '' }}
    </div>
</div>