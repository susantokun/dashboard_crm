<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (isset($meta))
        {{ $meta }}
    @else
        <meta name="description" content="{{ $configuration->desc }}">
    @endif

    <meta name="author" content="{{ $configuration->author }}" />

    <link rel="shortcut icon" href="{{ asset('/storage/' . $configuration->favicon) }}" />
    <link rel="canonical" href="{{ url()->full() }}" />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=ubuntu:300,400,500,700" rel="stylesheet" />

    <title>
        @if (isset($title))
            {{ $title }} -
        @endif{{ config('app.name', 'LTS Blade') }}
    </title>
    @stack('styles')

    @vite(['resources/css/frontend/app.css', 'resources/js/frontend/app.js'])
</head>

<body>
    <main>
        {{ $slot }}
    </main>
    @stack('scripts')
</body>

</html>
