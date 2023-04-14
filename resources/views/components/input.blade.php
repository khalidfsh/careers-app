@props(['disabled' => false])

@if ($attributes->get('type') === 'textarea')
    <textarea {{ $attributes->merge(['class' => 'custom-textarea border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 dark:focus:border-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600 form-input shadow-sm']) }}>
            {{ $slot }}
    </textarea>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-0 border-b-2 foucs:border-b-0 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 dark:focus:border-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600']) !!}>
@endif