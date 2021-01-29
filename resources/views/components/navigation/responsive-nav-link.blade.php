@php
    $classes = (request()->routeIs($routeName) ?? false)
                ? 'bg-black bg-opacity-25 block rounded-md py-2 px-3 text-base font-medium text-white'
                : 'hover:bg-light-blue-800 block rounded-md py-2 px-3 text-base font-medium text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} href="{{ route($routeName) }}">
    {{ $displayName }}
</a>
