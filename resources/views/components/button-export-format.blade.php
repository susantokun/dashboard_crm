@props(['type' => false])

<button type="{{ $type ? $type : 'button' }}"
        {{ $attributes->merge(['class' => 'inline-flex justify-center px-4 py-2 text-sm font-medium border border-transparent rounded-md text-lime-900 bg-success/30 hover:bg-success/40 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-success/50 focus:ring ring-success/50']) }}>
    {{ $slot }}
</button>
