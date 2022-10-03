<div class="{{ request()->routeIs('home') ? 'bg-secondary/70' : 'bg-secondary/30' }}">

    <footer class="p-4 text-center select-none bg-secondary">
        <div class="container w-full px-0 mx-auto text-xs line-clamp-2 max-w-7xl md:px-6 md:text-sm">
            <div class="inline-flex">
                ©
                2022
                <div class="block md:hidden">.</div>
            </div>
            <div class="hidden md:inline-block">
                -
                <div class="inline-flex">
                    <a href="{{ url('') }}" class="font-bold uppercase hover:text-primary">
                        {{ $configuration->title }}
                    </a>
                    .
                </div>
            </div>
            <div class="inline-block">
                All rights reserved.
                Powered By
                <a target="_blank" class="font-bold uppercase hover:text-primary"
                   href="https://difolestari.com">DIFOLESTARI</a>
            </div>
        </div>
    </footer>
</div>
