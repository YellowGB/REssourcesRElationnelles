<x-app-layout>

    {{-- Si $ressource existe et n'est pas null, on est sur une édition et non une création --}}
    <h1>{{ isset($ressource) ? __('titles.edit.ressource') : __('titles.create.ressource') }}</h1>
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    
    {{-- <div class="modal">
        <div class="modal__inner">
            Test modal
        </div>
    </div> --}}

    <script>
        showModal();
        function showModal() {
            const modal = document.createElement("div");

            modal.classList.add("modal");
            modal.innerHTML =
            `
                <div class="modal__inner">
                    Test modal
                </div>
            `;
            document.body.appendChild(modal);
            // document.body.removeChild(modal);
        }
    </script>

    <style>
        .modal {
            --gap: 15px;

            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            padding: var(--gap);
            background: rgba(0, 0, 0, 0.5);
        }
        .modal__inner {
            background: #fff;
            width: 100%;
            max-width: 800px;
            border-radius: 4px;
        }
    </style>

    <form action="{{ isset($ressource) ? route('resources.update', ['id' => $ressource->id, 'ressourceable_id' => $ressource->ressourceable_id]) : route('resources.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="ressource-container">
            {{-- Partie commune --}}
            <x-ressource-creation-common :ressource="$ressource ?? null" />

            {{-- Contenu --}}
            <x-ressource-creation-content-picker :content="$content ?? null" />

            <button type="submit">{{ isset($ressource) ? __('titles.btn.edit') : __('titles.btn.create') }}</button>
        </div>
    </form>

    @edit($ressource)
        @can('delete-ressources', $ressource)
            <form action="{{ route('resources.destroy', $ressource->id) }}" method="get">
                <button type="submit">{{ __('titles.btn.delete') }}</button>
            </form>
        @endcan
    @endedit

    <script src="{{ asset('js/creation-ressource.js') }}" defer></script>

</x-app-layout>