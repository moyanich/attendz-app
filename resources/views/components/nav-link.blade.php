@props(['active'])

@php
/*
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'; 
*/

$classes = ($active ?? false)
    ? 'flex block px-4 py-2 mt-2 text-sm capitalize text-lightBlue-600 bg-transparent dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-2 hover:text-lightBlue-600 focus:text-lightBlue-600 focus:bg-gray-200 focus:outline-none focus:shadow-outline'
    : 'flex block px-4 py-2 mt-2 text-sm capitalize text-white bg-transparent dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-2 hover:text-lightBlue-600 focus:text-lightBlue-600 focus:bg-gray-200 focus:outline-none focus:shadow-outline';


@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

