@props([
    'favorite'  => 0,
    'used'      => 0,
    'saved'     => 0,
])

<div id="share" class="flex items-center">
    <x-icons.share
        :title="__('titles.btn.share')"
        @click="copyToClipboard()"
        {{ $attributes->merge(['class' => 'h-8 w-8 mr-1']) }}
    />
</div>
<x-dynamic-component :component="$saved ? 'icons.bookmark-full' : 'icons.bookmark-empty'"
    :title="__($saved ? 'titles.btn.bookmarked' : 'titles.btn.bookmark')"
    {{ $attributes->merge(['class' => 'h-8 w-8']) }}
/>
<x-dynamic-component :component="$favorite ? 'icons.heart-full' : 'icons.heart-empty'"
    :title="__($favorite ? 'titles.btn.favorited' : 'titles.btn.favorite')"
    {{ $attributes->merge(['class' => 'h-8 w-8']) }}
/>
<x-dynamic-component :component="$used ? 'icons.flag-full' : 'icons.flag-empty'"
    :title="__($used ? 'titles.btn.exploited' : 'titles.btn.exploit')"
    {{ $attributes->merge(['class' => 'h-8 w-8']) }}
/>