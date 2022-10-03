<div class="container px-6 py-16 mx-auto max-w-7xl" id="clients">
    <h2 class="mb-6 text-3xl font-bold text-center">
        {{ __('Clients') }}
    </h2>
    @if ($clients->count() > 0)
        @include('frontend.layouts.slider-client')
    @endif
    @if ($partners->count() > 0)
        @include('frontend.layouts.slider-partner')
    @endif
</div>
