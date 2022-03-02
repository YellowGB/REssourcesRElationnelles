<div>
    @props([
        'user',
        'route' => route('profile.password'),
        'title' => __('titles.profile.title.preferences'),
        'desc'  => __('titles.profile.desc.preferences'),
    ])
    <x-action-section
        :title="$title"
        :route="$route"
        :description="$desc"
    >
        <x-slot name="content">
            <div class="max-w-xl text-sm flex justify-around">
                <x-togglers.lang />
                <x-togglers.theme />
            </div>
            
        </x-slot>
    </x-action-section>
</div>