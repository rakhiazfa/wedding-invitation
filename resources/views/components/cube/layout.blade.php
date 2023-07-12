<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="description" content="{{ $meta['description'] ?? env('APP_NAME') }}">

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ $meta['title'] ?? env('APP_NAME') }}">
    <meta property="og:title" content="{{ $meta['title'] ?? env('APP_NAME') }}">
    <meta property="og:description" content="{{ $meta['description'] ?? env('APP_NAME') }}">
    <meta property="og:url" content="{{ $meta['url'] ?? env('APP_URL') }}" />
    <meta property="og:image" itemprop="image" content="{{ $meta['image'] ?? '' }}" />
    <meta property="og:image:type" content="{{ $meta['image_type'] ?? 'image/jpg' }}">
    <meta property="og:image:width" content="{{ $meta['image_width'] ?? '500' }}">
    <meta property="og:image:height" content="{{ $meta['image_height'] ?? '500' }}">
    <meta property="og:image:alt" content="{{ $meta['image_alt'] ?? 'Wedding Invitation' }}" />
    <meta property="og:updated_time" content="2023-01-17T20:28:50+07:00" />

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
