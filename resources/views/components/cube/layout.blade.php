<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="description" content="{{ $meta['description'] ?? env('APP_NAME') }}">

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ $meta['title'] ?? env('APP_NAME') }}">
    <meta property="og:title" content="{{ $meta['title'] ?? env('APP_NAME') }}">
    <meta property="og:description" content="{{ $meta['description'] ?? env('APP_NAME') }}">
    <meta property="og:image" itemprop="image" content="{{ $meta['image'] ?? '' }}" />
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">

    @vite('resources/css/cube.css')

    {{-- Additional Styles --}}
    @yield('styles')

    <title>{{ $title }}</title>
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    {{ $slot }}

    @vite('resources/js/cube.js')

    {{-- Additional Scripts --}}
    @yield('scripts')

</body>

</html>
