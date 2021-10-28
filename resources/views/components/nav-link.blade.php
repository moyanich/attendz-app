@props(['active'])

@php
/*
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'; 
*/

$classes = ($active ?? false)
    ? 'flex items-center text-xs uppercase py-2 px-6 mt-4 font-bold block text-lightBlue-500 hover:text-lightBlue-600 cursor-pointer'
    : 'flex items-center text-xs uppercase py-2 px-6 mt-4 font-bold block text-white hover:text-blueGray-500 cursor-pointer';


@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

