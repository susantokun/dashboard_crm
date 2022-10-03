<div class="container px-6 pb-20 mx-auto pt-14 max-w-7xl" id="about">
    <div class="mb-10 text-3xl font-bold text-left">
        <h1>
            <div class="text-3xl font-bold uppercase">{{ $configuration->title }}</div>
            <div class="mb-3 text-xl font-medium">{{ $configuration->slogan }}</div>
        </h1>
    </div>
    <div class="h-full max-w-7xl {{ isset($configuration->image) ?? 'min-h-[20rem]' }}">
        @if (!empty($configuration->about_image))
            <img width="800px" height="400px"
                 class="md:w-1/2 md:h-80 md:float-right rounded-lg shadow-lg object-cover object-center mb-2 md:ml-5 md:[clip-path:polygon(30%_0%,100%_0%,100%_100%,0%_100%)] md:[shape-outside:polygon(30%_0%,100%_0%,100%_100%,0%_100%)]"
                 src="{{ asset('/storage/' . $configuration->about_image) }}" alt="{{ __('About') }}">
        @endif
        <div class="mx-auto prose-sm prose md:prose-base max-w-none about">
            {!! $configuration->about !!}
        </div>
    </div>
</div>
