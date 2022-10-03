@props(['data' => '', 'title' => ''])

<div class="flex flex-col justify-between px-1 sm:flex-row">
    <div class="text-center sm:text-left flex-start">
        <h3 class="text-lg font-semibold leading-6 text-gray-800 dark:text-gray-200">
            {{ __($data . '_title', ['Attribute' => $title]) }}
        </h3>
        <p class="mt-px text-sm leading-5 text-gray-600 dark:text-gray-400 sm:mt-1 lowercase first-letter:uppercase">
            {{ __($data . '_desc', ['attribute' => $title]) }}
        </p>
    </div>
    <div class="flex items-end justify-center mt-2 sm:mt-0">
        <nav aria-label="breadcrumb"
             class="flex items-center justify-center px-3 py-1 rounded-md sm:px-0 sm:py-0 sm:rounded-none -intro-x bg-secondary sm:bg-transparent">
            {{ $slot }}
        </nav>
    </div>
</div>
<div class="pb-4 mb-4 border-b border-dashed border-primary/60"></div>
