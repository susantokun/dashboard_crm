<div class="flex flex-col items-center justify-center min-h-screen pb-20 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div
         class="w-full px-6 py-4 mt-6 overflow-hidden bg-white border-t border-b border-dashed shadow-none sm:border-none border-primary/30 sm:shadow-md sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
