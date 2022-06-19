<div class="mt-2 md:mt-4 lg:mt-8">
    @props([
        'route',
        'title',
        'desc',
    ])
    <x-form-section
        :title="$title"
        :route="$route"
        :method="'get'"
    >
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <p class="text-justify">{{ $desc }}</p>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-button>
                @lang('titles.btn.access')
            </x-button>
        </x-slot>
    </x-form-section>
</div>