@props(['type' => false])

<button type="{{ $type ? $type : 'button' }}"
        {{ $attributes->merge(['class' => 'p-1.5 inline-flex items-center justify-center text-white rounded-md shadow-sm bg-danger focus:border-danger/60 focus:ring focus:ring-danger/20 focus:ring-opacity-50 hover:bg-danger/80 disabled:opacity-25 disabled:cursor-not-allowed disabled:hover:bg-danger focus:outline-none transition duration-300']) }}>
    <i data-feather='trash-2' class="w-4 h-4"></i>
</button>
