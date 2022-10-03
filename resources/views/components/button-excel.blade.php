@props(['type' => false])

<button type="{{ $type ? $type : 'button' }}"
        {{ $attributes->merge([
            'class' => 'inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold tracking-wide text-gray-600 transition
            duration-150 ease-in-out border border-gray-200 rounded-md shadow-sm select-none bg-secondary enabled:hover:bg-secondary/30 active:bg-secondary/90
            focus:outline-none focus:border-gray-400 focus:ring ring-gray-200 disabled:opacity-60 disabled:cursor-not-allowed',
        ]) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="16" height="16" fill="currentColor"
         class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
        <path
              d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
        <path
              d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
    </svg>
    {{ $slot }}
</button>
