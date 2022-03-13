<div id="share" class="flex items-center">
    <x-icons.share
        :title="__('titles.btn.share')"
        @click="copyToClipboard()"
        {{ $attributes->merge(['class' => 'h-8 w-8 mr-1']) }}
    />
</div>
<x-icons.bookmark-empty
    :title="__('titles.btn.bookmark')"
    {{ $attributes->merge(['class' => 'h-8 w-8']) }}
/>
<x-icons.heart-empty
    :title="__('titles.btn.favorite')"
    {{ $attributes->merge(['class' => 'h-8 w-8']) }}
/>
<x-icons.flag-empty
    :title="__('titles.btn.exploit')"
    {{ $attributes->merge(['class' => 'h-8 w-8']) }}
/>