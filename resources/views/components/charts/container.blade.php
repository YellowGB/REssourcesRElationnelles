@props(['show'])
<div x-show="{{ $show }}" class="mt-4 flex flex-col items-center justify-center">
    {{ $slot }}
</div>