@props(['seoTitle', 'seoDescription', 'seoKeywords', 'seoImageAlt', 'seoImage', 'seoType' => 'article', 'page' => ''])

<x-slot name="meta">
    <title>
        {{ $page == 'home' ? $seoTitle . ' — ' . $configuration->slogan : $seoTitle . ' — ' . $configuration->title }}
    </title>

    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $seoType }}">
    <meta property="og:title"
          content="{{ $page == 'home' ? $seoTitle . ' — ' . $configuration->slogan : $seoTitle . ' — ' . $configuration->title }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:image" content="{{ url('/storage/' . $seoImage) }}">
    <meta property="og:image:alt" content="{{ $seoImageAlt }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="400">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title"
          content="{{ $page == 'home' ? $seoTitle . ' — ' . $configuration->slogan : $seoTitle . ' — ' . $configuration->title }}">
    <meta property="twitter:description" content="{{ $seoDescription }}">
    <meta property="twitter:image" content="{{ asset('/storage/' . $seoImage) }}">
    <meta property="twitter:site" content="{{ '@' . $configuration->author }}">
    <meta property="twitter:creator" content="@susantokun">
</x-slot>
