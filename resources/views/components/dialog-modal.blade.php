{{-- x-cloak: https://alpinejs.dev/directives/cloak --}}
<div
    x-cloak
    x-data="{ showDialogModal: false }"
>
    @props([
        'title'     => __('titles.title'),
        'content'   => __('titles.content.content'),
        'cancel'    => __('titles.btn.cancel'),
        'ok'        => __('titles.btn.ok'),
        'confirm'   => 'showDialogModal = false',
    ])
    {{ $slot }}
    <div
        x-show="showDialogModal"
        x-trap.noscroll="showDialogModal"
        class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50"
    >
        <div class="max-w-md p-6 bg-blanc dark:bg-slate-700 border-2">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl">{{ $title }}</h3>
                <x-icons.cross class="cursor-pointer" @click="showDialogModal = false" />
            </div>
            <div class="mt-4">
                <p class="mb-4 text-sm">
                    {{ $content }}
                </p>
                <x-danger-button @click="showDialogModal = false">{{ $cancel }}</x-danger-button>
                <x-safe-button @click="{{ $confirm }}">{{ $ok }}</x-safe-button>
            </div>
        </div>
    </div>
</div>