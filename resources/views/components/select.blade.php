@props(['id', 'name', 'options'])

<select id="{{ $id }}"
    name="{{ $name }}"
    {{ $attributes->merge([
        'class' =>
            'border-b-2 border-0 foucs:border-0 focus:ring-0 border-gray-300 dark:border-gray-600 dark:bg-violet-950/5 bg-emerald-700/5 focus:border-violet-950 dark:focus:border-emerald-700 hover:bg-violet-950/20 hover:dark:bg-emerald-700/20',
    ]) }}>
    @foreach ($options as $key => $option)
        <option value="{{ $key }}">
            {{ __($option) }}</option>
    @endforeach
</select>
