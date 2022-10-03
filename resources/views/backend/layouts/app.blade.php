<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="{{ $dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ $configuration->teaser }}" />
    <meta name="keywords" content="{{ $configuration->keywords }}" />
    <meta name="author" content="{{ $configuration->author }}" />
    <title>{{ isset($title) ? $title . ' — ' . $configuration->title : $configuration->title }}</title>

    <link rel="shortcut icon" href="{{ asset('/storage/' . $configuration->favicon) }}" />
    <link rel="canonical" href="{{ url()->full() }}" />

    @vite(['resources/css/backend/app.css', 'resources/js/backend/app.js'])
    @stack('styles')
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen bg-primary text-dark dark:bg-dark dark:text-light print:hidden md:flex-row">
        @include('backend.layouts.sidebar')
        @include('backend.layouts.mobile-menu')
        <div class="flex flex-1 w-full overflow-x-hidden">
            <div class="content">
                <div class="flex-1">
                    @include('backend.layouts.topbar')
                    <main>
                        {{ $slot }}
                    </main>
                </div>
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery.min.js') }}"></script>
    @stack('scripts')
    @include('sweetalert::alert')
</body>

</html>
