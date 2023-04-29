@props(['iteration' => 0])

{{-- add dark support --}}
<tr class="{{ $iteration % 2 == 0 ? 'bg-gray-50 dark:bg-gray-800' : '' }}">
    {{ $slot }}
</tr>
