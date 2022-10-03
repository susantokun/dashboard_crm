@props(['type' => false])

<button type="{{ $type ? $type : 'button' }}"
        {{ $attributes->merge(['class' => 'p-1.5 inline-flex items-center justify-center text-white rounded-md shadow-sm bg-info focus:border-info/60 focus:ring focus:ring-info/20 focus:ring-opacity-50 hover:bg-info/80 disabled:opacity-60 disabled:cursor-not-allowed disabled:hover:bg-info focus:outline-none transition duration-300']) }}>
    <i data-feather='eye' class="w-4 h-4"></i>
</button>
