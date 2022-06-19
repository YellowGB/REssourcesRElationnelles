<div class="grid grid-cols-1 lg:grid-cols-diptyque gap-4 justify-items-stretch items-stretch">
    <div>
        {{ $slot }}
    </div>
    <div>
        {{ $right ?? '' }}
    </div>
</div>