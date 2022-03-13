<svg
    {{ $attributes->merge(['class' => 'h-6 w-6']) }}
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
    stroke-width="2"
>
    @if (isset($title))
        <title>{{ $title }}</title>
    @endif
    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
</svg>