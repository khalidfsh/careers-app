@props(['id', 'name', 'options'])
<select id="{{ $id }}"
    name="{{ $name }}"
    {{ $attributes->merge([
        'class' =>
            'ps-2 border-b-2 border-0 foucs:border-0 text-gray-900 dark:text-gray-100 focus:ring-0 border-gray-300 dark:border-gray-600  bg-gray-100 dark:bg-gray-800 focus:border-violet-950 dark:focus:border-emerald-700 hover:bg-violet-950/20 hover:dark:bg-emerald-700/20',
    ]) }}>
    @foreach ($options as $key => $option)
        <option class="" value="{{ $key }}">
            {{ __($option) }}
        </option>
    @endforeach
</select>
