@props(['type' => false])

<button type="{{ $type ? $type : 'button' }}"
        {{ $attributes->merge(['class' => 'p-1.5 inline-flex items-center justify-center text-white rounded-md shadow-sm bg-warning focus:border-warning/60 focus:ring focus:ring-warning/20 focus:ring-opacity-50 hover:bg-warning/80 disabled:opacity-60 disabled:cursor-not-allowed disabled:hover:bg-warning focus:outline-none transition duration-300']) }}>
    <i data-feather='edit' class="w-4 h-4"></i>
</button>
