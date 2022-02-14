<div>
    {{-- {{$page}} - {{$per_page}} --}}
    
    <div class="flex justify-center mb-4">
        <div wire:loading.delay>
            <x-icons.loading class="h-8 w-8" />
        </div>
    </div>

    @guest 
        @foreach ($ressources as $ressource)
            @if ($ressource->restriction === 'public')
                <x-ressource-preview :ressource="$ressource" />
            @endif
        @endforeach
    @endguest
    @auth
        @can('access-admin')
            @foreach ($ressources as $ressource)
                <x-ressource-preview :ressource="$ressource" />
            @endforeach
        @else
            @foreach ($ressources as $ressource)
                @if ($ressource->user_id === Auth::user()->id || $ressource->restriction === 'public')
                    <x-ressource-preview :ressource="$ressource" />
                @endif
            @endforeach
        @endcan
    @endauth

    @if($ressources->hasMorePages())
        @livewire('ressources-extra-loader', [
            'page'          => $page,
            'per_page'      => $per_page,
            'search_terms'  => $search_terms,
            'key'           => 'ressources-page-' . $page,
            ])
    @endif

</div>
