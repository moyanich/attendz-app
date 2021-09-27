@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block px-4 py-2 text-sm text-gray-700 active:bg-indigo-600 active:text-white'
    : 'block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
