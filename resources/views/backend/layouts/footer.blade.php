<div class="bg-secondary px-4 py-1.5 text-center text-xs select-none print:hidden">
    ©
    2022
    <a href="{{ url('') }}" class="hidden font-semibold uppercase md:inline-block hover:text-primary">
        {{ $configuration->title }}
    </a>
    <a href="{{ url('') }}" class="inline-block font-semibold uppercase md:hidden hover:text-primary">
        {{ $configuration->title_short }}
    </a>
    {{ __('Powered By') }}
    <a target="_blank" class="font-semibold uppercase hover:text-primary" href="https://difolestari.com">DIFOLESTARI</a>
</div>
