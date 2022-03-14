<div class="md:grid md:grid-cols-3 md:gap-6">
    @props([
        'title',
        'route',
        'description'   => '',
        'aside'         => '',
        'method'        => 'post',
    ])

    <x-title-section>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
        <x-slot name="aside">{{ $aside }}</x-slot>
    </x-title-section>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ $route }}" method="{{ $method }}">
            @csrf
            <div class="px-4 py-5 bg-white dark:bg-gray-700 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-violet-light text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md" v-if="hasActions">
                {{ $actions ?? '' }}
            </div>
        </form>
    </div>
</div>