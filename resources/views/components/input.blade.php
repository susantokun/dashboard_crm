@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'rounded-md shadow-sm border-gray-300  h-10 md:h-11 focus:border-primary/30 focus:ring focus:ring-primary/10 focus:ring-opacity-50',
]) !!}>
