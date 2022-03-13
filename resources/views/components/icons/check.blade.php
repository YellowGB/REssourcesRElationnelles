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
    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
</svg>