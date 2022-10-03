<div class="container px-6 mx-auto select-none py-14 max-w-7xl" id="videos">
    {{-- <div class="mb-10 text-3xl font-bold text-center">
        {{ __('Videos') }}
    </div> --}}
    <div class="!px-1 relative swiper video select-none -mb-10">
        <div
             class="swiper-wrapper{{ $videos->count() < 4 ? ' flex items-center justify-start md:justify-center' : '' }}">
            @foreach ($videos as $item)
                @if ($item->category == \App\Enums\VideoCategory::INTERNAL)
                    <div
                         class="my-1 overflow-hidden bg-white rounded-sm shadow-md swiper-slide ring-2 ring-primary/30 shadow-primary/10 hover:shadow-lg hover:shadow-primary/30">
                        <div class="w-full !aspect-[16/9] cursor-pointer h-32 hidden hiddenVideo">
                            <video width="100%" height="100%" controls>
                                <source src="{{ asset('/storage/' . $item->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="px-3 py-1 text-center border border-t-2 border-primary/30">
                            <h3 class="font-medium truncate">{{ $item->name }}</h3>
                        </div>
                    </div>
                @else
                    <div
                         class="my-1 overflow-hidden bg-white rounded-sm shadow-md swiper-slide ring-2 ring-primary/30 shadow-primary/10 hover:shadow-lg hover:shadow-primary/30">
                        <div class="w-full !aspect-[16/9] cursor-pointer h-32 hidden hiddenVideo">
                            <iframe src="{{ $item->video }}" width="100%" height="100%" title="{{ $item->name }}"
                                    frameBorder={0}
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowFullScreen></iframe>
                        </div>
                        <div class="px-3 py-1 text-center border border-t-2 border-primary/30">
                            <h3 class="font-medium truncate">{{ $item->name }}</h3>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="w-full h-10">
            <div class="swiper-pagination video"></div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".hiddenVideo").removeClass("hidden h-32");
            }, 1000);
        })
    </script>
@endpush
