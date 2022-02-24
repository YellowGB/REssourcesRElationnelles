<div>
    @props([
        'user',
        'route'     => route('profile.delete'),
        'title'     => __('titles.profile.title.delete'),
        'desc'      => __('titles.profile.desc.delete'),
        'content'   => __('titles.profile.desc.delconfirm'),
        'ok'        => __('titles.btn.save'),
    ])
    <x-action-section
        :title="$title"
        :route="$route"
        :description="$desc"
    >
        <x-slot name="content">
            <div class="max-w-xl text-sm">
                <p>@lang('titles.profile.desc.deldetail')</p>
            </div>

            {{-- Modal de confirmation --}}
            <x-dialog-modal :title="$title" :content="$content" :ok="$ok">
                <x-danger-button class="mt-5" @click="showDialogModal = true">
                    @lang('titles.profile.title.delete')
                </x-danger-button>
            </x-dialog-modal>
        </x-slot>
    </x-action-section>
</div>