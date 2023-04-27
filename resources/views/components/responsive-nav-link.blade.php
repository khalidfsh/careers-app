@props(['active'])

@php
    $classes = $active ?? false ? 'block w-full ps-3 pe-4 py-2 border-s-4 border-violet-950 dark:border-emerald-700 text-start text-base font-medium text-violet-950 dark:text-emerald-700 bg-violet-950/10 dark:bg-emerald-700/10 focus:outline-none focus:text-violet-800 dark:focus:text-emerald-200 focus:bg-teal-100 dark:focus:bg-teal-900 focus:border-violet-700 dark:focus:border-emerald-300 transition duration-150 ease-in-out' : 'block w-full ps-3 pe-4 py-2 border-s-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
