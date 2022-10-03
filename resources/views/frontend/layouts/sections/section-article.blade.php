<div class="container px-6 mx-auto py-14 max-w-7xl" id="articles">
    <h2 class="mb-10 text-3xl font-bold text-center">
        {{ __('Articles') }}
    </h2>
    <div class="grid gap-6 md:grid-cols-3">
        @foreach ($articles as $item)
            <a class="flex flex-col justify-between h-full overflow-hidden transition duration-300 bg-white rounded-lg shadow-lg hover:bg-primary/30"
               href="{{ route('frontend.articles.show', $item->slug) }}">
                <div class="">
                    <div class="flex items-center justify-center w-full">
                        <img class="object-cover object-center w-full h-48"
                             src="{{ $item->image ? asset('/storage/' . $item->image) : asset('/storage/images/no-article.png') }}"
                             width="auto" height="auto" alt="{{ $item->title }}">
                    </div>
                    <div class="p-4">
                        <div class="mb-2 text-lg font-medium leading-snug truncate">{{ $item->title }}</div>
                        <div class="text-sm font-light line-clamp-2">{{ $item->desc }}</div>
                    </div>
                </div>
                <div class="pb-4 pr-4 mt-1 text-xs italic font-light text-right">
                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                </div>
            </a>
        @endforeach
    </div>
    @if ($articles->count() == 6)
        <div class="inline-flex justify-end w-full mt-6">
            <a href="{{ route('frontend.articles.table') }}">
                <x-button-primary>
                    {{ __('Load more') }}
                </x-button-primary>
            </a>
        </div>
    @endif
</div>
