@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-violet-light text-base font-medium text-violet-dark dark:text-gris-light bg-violet-lighter dark:bg-slate-700 focus:outline-none focus:text-indigo-800 focus:bg-violet-light dark:focus:bg-slate-600 focus:border-violet-dark transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-blanc hover:text-gray-800 hover:bg-violet-lightest dark:hover:bg-slate-700 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-violet-lighter dark:focus:bg-slate-600 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
