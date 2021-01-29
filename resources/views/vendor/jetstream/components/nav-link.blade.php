@props(['active'])

@php
$classes = ($active ?? false)
                ? 'bg-black bg-opacity-25 rounded-md py-2 px-3 mx-1 text-sm font-medium text-white'
                : 'hover:bg-light-blue-800 rounded-md py-2 px-3 mx-1 text-sm font-medium text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
