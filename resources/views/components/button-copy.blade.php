@props(['type' => false])

<button type="{{ $type ? $type : 'button' }}"
        {{ $attributes->merge(['class' => 'p-1.5 inline-flex items-center justify-center text-white rounded-md shadow-sm bg-slate-500 focus:border-slate-500 focus:ring focus:ring-slate-300 focus:ring-opacity-50 hover:bg-slate-600 disabled:opacity-25 disabled:cursor-not-allowed disabled:hover:bg-slate-500 focus:outline-none transition duration-300']) }}>
    <i data-feather='copy' class="w-4 h-4"></i>
</button>
