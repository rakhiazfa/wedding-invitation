<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:title" content="{{ $meta['title'] ?? '' }}">
    <meta property="og:description" content="{{ $meta['description'] ?? '' }}">
    <meta property="og:image" content="{{ $meta['image'] ?? '' }}" />

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
