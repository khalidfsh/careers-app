@props(['disabled' => false])

@if ($attributes->get('type') === 'textarea')
    <textarea
        {{ $attributes->merge(['class' => 'form-input custom-textarea text-gray-900 dark:cursor-white border-b-2 border-0 border-gray-300 dark:border-gray-600 dark:bg-gray-900 bg-gray-200 dark:text-gray-300 focus:border-violet-950 dark:focus:border-emerald-700 focus:ring-violet-950 dark:focus:ring-emerald-700 focus:bg-violet-950/5 dark:focus:bg-emerald-700/5 ', 'rows' => '5']) }}>
            {{ $slot }}
    </textarea>
@else
    <input {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
            'class' =>
                'border-0 border-b-2  dark:cursor-white text-gray-900 dark:text-gray-100 foucs:border-0 focus:ring-0 border-gray-300 dark:border-gray-600 dark:bg-gray-900 bg-gray-200 focus:border-violet-950 dark:focus:border-emerald-700 focus:bg-violet-950/5 dark:focus:bg-emerald-700/5 hover:bg-violet-950/20 hover:dark:bg-emerald-700/20 ',
        ]) !!}>
@endif
