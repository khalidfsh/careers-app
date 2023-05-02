@props(['wrap' => true])

<td {{ $attributes->merge(['class' => 'px-2 py-2 whitespace-nowrap']) }}>
    @if ($wrap)
        <div class="text-sm text-gray-900 dark:text-gray-100">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</td>
