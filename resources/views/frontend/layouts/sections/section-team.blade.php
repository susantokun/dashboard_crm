{{-- <div class="container px-6 mx-auto select-none py-14 max-w-7xl" id="teams">
    <h2 class="mb-10 text-3xl font-bold text-center">
        {{ __('Teams') }}
    </h2>
    <div class="flex flex-wrap items-center justify-center w-full lg:flex-nowrap">
        @foreach ($teams as $item)
            <div
                 class="relative flex flex-col items-center justify-center w-full h-full overflow-hidden rounded-lg shadow-md cursor-pointer group bg-white/90">
                <div class="w-full text-center">
                    <img width="512px" height="512px"
                         class="object-cover w-full transition-all duration-300 ease-in-out brightness-90 blur-0 h-54 {{ $item->biodata ? 'group-hover:blur-sm group-hover:brightness-50' : 'group-hover:brightness-100' }}"
                         src="{{ $item->image ? asset('/storage/' . $item->image . '?' . strtotime(date('Y-m-d H:i:s'))) : asset('/storage/images/no-team.png') }}"
                         alt="{{ $item->full_name }}">
                    <div class="h-20 px-6 py-4">
                        <div class="text-lg font-semibold select-text">{{ $item->full_name }}</div>
                        <div class="italic">{{ $item->position }}</div>
                    </div>
                </div>
                @if ($item->biodata)
                    <div
                         class="absolute bottom-[80px] w-full translate-y-[80px] h-full transition-all duration-300 ease-in-out opacity-0 select-text bg-dark/30 group-hover:translate-y-0 group-hover:opacity-100 text-light">
                        <div class="flex items-center justify-center h-full p-4 pt-[94px] text-center break-words">
                            <div class="prose-sm prose text-light">
                                {!! $item->biodata !!}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div> --}}
<div class="container px-6 mx-auto select-none py-14 max-w-7xl" id="teams">
    <h2 class="mb-6 text-3xl font-bold text-center">
        {{ __('Teams') }}
    </h2>
    <div class="!p-1 swiper team select-none">
        <div class="swiper-wrapper{{ $teams->count() < 5 ? ' flex items-center justify-start md:justify-center' : '' }}">
            @foreach ($teams as $item)
                <div
                     class="relative flex-col items-center justify-center hidden w-full h-full overflow-hidden rounded-lg shadow-md cursor-pointer group bg-white/90 swiper-slide hiddenTeam">
                    <div class="w-full text-center">
                        <img width="512px" height="512px"
                             class="object-cover w-full transition-all duration-300 ease-in-out brightness-90 blur-0 h-54 {{ $item->biodata ? 'group-hover:blur-sm group-hover:brightness-50' : 'group-hover:brightness-100' }}"
                             src="{{ $item->image ? asset('/storage/' . $item->image . '?' . strtotime(date('Y-m-d H:i:s'))) : asset('/storage/images/no-team.png') }}"
                             alt="{{ $item->full_name }}">
                        <div class="h-20 px-2 py-4">
                            <div class="text-lg font-semibold truncate select-text">{{ $item->full_name }}</div>
                            <div class="italic">{{ $item->position }}</div>
                        </div>
                    </div>
                    @if ($item->biodata)
                        <div
                             class="absolute bottom-[80px] w-full translate-y-[80px] h-full transition-all duration-300 ease-in-out opacity-0 select-text bg-dark/30 group-hover:translate-y-0 group-hover:opacity-100 text-light">
                            <div class="flex items-center justify-center h-full p-4 pt-[94px] text-center break-words">
                                <div class="prose-sm prose text-light">
                                    {!! $item->biodata !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".hiddenTeam").removeClass("hidden");
                $(".hiddenTeam").addClass("flex");
            }, 1000);
        })
    </script>
@endpush
