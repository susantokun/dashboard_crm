<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="{{ $configuration->author }}" />
    @if (isset($meta))
        {{ $meta }}
    @else
        <title>{{ $configuration->title . ' - ' . $configuration->slogan }}</title>
        <meta name="description" content="{{ $configuration->desc }}">
    @endif

    <link rel="shortcut icon" href="{{ asset('/storage/' . $configuration->favicon) }}" />
    <link rel="canonical" href="{{ url()->full() }}" />

    <link href="https://fonts.bunny.net/css?family=ubuntu:300,400,500,700|work-sans:400,500,600,700" rel="stylesheet" />

    @stack('styles')

    @vite(['resources/css/frontend/app.css', 'resources/js/frontend/app.js'])
</head>

<body>
    <div class="relative flex flex-col flex-1 w-full min-h-screen bg-white" id="home">
        <div
             class="navbar w-full{{ request()->routeIs('home') ? ' bg-white/80 text-slate-800' : ' bg-white text-slate-800' }} fixed z-30 shadow-md">
            {{-- <div class="fixed z-30 w-full text-gray-700 bg-white shadow-md navbar"> --}}
            @include('frontend.layouts.navbar')
        </div>
        <main class="items-center flex-1 bg-white">
            <div class="grid grid-cols-12 py-16">
                <div class="col-span-12 lg:col-span-10 lg:col-start-2">
                    {{ $slot }}
                </div>
            </div>
        </main>
        @include('frontend.layouts.footer')

        <div class="fixed z-30 hidden scroll-to-top bottom-9 right-6" onclick="scrollToTop()" onKeyPress="scrollToTop()"
             role="button">
            <div title="Up Gan"
                 class="rounded bg-secondary p-1 text-lg text-white transition duration-150 hover:scale-[1.05] hover:bg-primary/80 active:scale-[0.95] active:bg-primary">
                <i data-feather="arrow-up" class="w-6 h-6"></i>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery.min.js') }}"></script>
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 200) {
                $(".scroll-to-top").removeClass("hidden");
                $(".scroll-to-top").addClass("fixed");
            } else {
                $(".scroll-to-top").removeClass("fixed");
                $(".scroll-to-top").addClass("hidden");
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
    @stack('scripts')
</body>

</html>
