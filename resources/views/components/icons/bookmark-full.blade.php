<svg
    {{ $attributes->merge(['class' => 'h-5 w-5']) }}
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 20 20"
    fill="currentColor"
>
    @if (isset($title))
        <title>{{ $title }}</title>
    @endif
    <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
</svg>