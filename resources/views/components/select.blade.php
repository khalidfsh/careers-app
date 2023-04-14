@props(['id', 'name', 'options'])

<select {{ $attributes->merge(['class' => 'block border-b-2 border-0 foucs:outline-none border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-teal-500 dark:focus:border-teal-600 focus:ring-teal-500 dark:focus:ring-teal-600 peer']) }} id="{{ $id }}" name="{{ $name }}">
    @foreach($options as $key => $option)
        <option value="{{ $key }}">{{ __($option) }}</option>
    @endforeach
</select>