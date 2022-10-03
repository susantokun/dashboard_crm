<div class="container px-6 mx-auto select-none py-14 max-w-7xl" id="services">
    <h2 class="mb-10 text-3xl font-bold text-center">
        {{ __('Services') }}
    </h2>

    <div class="relative w-full h-full items-center justify-center max-w-7xl min-h-[24rem]" x-data="{ tab: 1 }">
        @foreach ($services as $item)
            <div class="flex flex-row items-center justify-between w-full gap-6">
                <div class="hidden w-1/2 md:block">
                    <div class="absolute top-0 left-0 w-1/2 pr-4">
                        <div class="w-full overflow-hidden rounded-lg" x-show="tab === {{ $item->id }}"
                             x-transition:enter="transition delay-200 duration-500 transform ease-in"
                             x-transition:enter-start="opacity-0">
                            @if ($item->image)
                                <img width="800px" height="400px" data-action="zoom"
                                     class="object-cover object-center w-full"
                                     src="{{ asset('/storage/' . $item->image) }}" alt="{{ $item->name }}">
                            @else
                                -
                            @endif
                        </div>
                    </div>
                </div>
                <div class="inline-flex flex-col w-full md:w-1/2">
                    <a href="#"
                       :class="{ 'font-bold': tab === {{ $item->id }}, ' ': tab !== {{ $item->id }} }"
                       @click.prevent="tab={{ $item->id }}"
                       class="inline-flex justify-between px-4 py-3 mb-1 font-medium text-white border bg-secondary border-primary/5">
                        <div class="">{{ $item->name }}</div>
                        <div class="transition duration-300"
                             :class="{
                                 'rotate-180': tab === {{ $item->id }},
                                 ' rotate-0': tab !==
                                     {{ $item->id }}
                             }">
                            <i data-feather="chevron-up" class="w-5 h-5"></i>
                        </div>
                    </a>

                    <div class="px-4 py-2 mb-1 bg-white border border-transparent shadow-sm select-text rounded-b-md"
                         x-show="tab === {{ $item->id }}"
                         x-transition:enter="transition delay-200 duration-500 transform ease-in"
                         x-transition:enter-start="opacity-0">

                        <div class="block w-full mb-1 md:hidden">
                            <img width="800px" height="400px" class="object-cover object-center rounded-lg shadow-lg"
                                 src="{{ asset('/storage/' . $item->image) }}" alt="{{ $item->name }}">
                        </div>
                        {!! $item->body ?? '-' !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <div class="grid flex-col justify-center grid-cols-1 overflow-hidden md:grid-cols-3">
        @foreach ($services as $item)
            <div class="w-full text-center bg-primary/80 odd:bg-white/80 text-light odd:text-dark">
                <img class="object-cover w-full transition duration-300 brightness-90 hover:brightness-95 h-54"
                     src="{{ asset('/storage/' . $item->image) }}?{{ strtotime(date('Y-m-d H:i:s')) }}"
                     alt="{{ $item->name }}">
                <div class="p-6">
                    <div class="mb-4 text-2xl font-bold">{{ $item->name }}</div>
                    <div class="text-base">{!! $item->body !!}</div>
                </div>
            </div>
        @endforeach
    </div> --}}
</div>
