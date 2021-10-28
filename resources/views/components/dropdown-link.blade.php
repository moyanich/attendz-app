@props(['active'])

@php

$classes = ($active ?? false)
    ? 'block px-4 py-2 mt-2 text-sm capitalize text-lightBlue-600 bg-transparent dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-lightBlue-600 focus:text-lightBlue-600 focus:bg-gray-200 focus:outline-none focus:shadow-outline'
    : 'block px-4 py-2 mt-2 text-sm capitalize text-white bg-transparent dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-lightBlue-600 focus:text-lightBlue-600 focus:bg-gray-200 focus:outline-none focus:shadow-outline';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>


{{--  <a {{ $attributes->merge(['class' => 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>{{ $slot }}</a>
--}}