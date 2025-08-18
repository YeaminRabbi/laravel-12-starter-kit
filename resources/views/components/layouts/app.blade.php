<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta Data -->
    <title>@stack('title')</title>
    <meta name="description" content="@stack('meta_description')">
    <meta name="keywords" content="@stack('meta_keywords')">


    <!-- Favicon -->
    <link rel="icon" href="#" type="image/x-icon">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AOS CDN -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema Data -->
    @stack('schema')

    <!-- Styles -->
    @stack('styles')

</head>

<body>

    <!-- Header Section -->
    <x-layouts.header />

    @if ($slot->isEmpty())
        <p>
            Empty $slot
        </p>
    @else
        {{ $slot }}
    @endif

    <!-- Footer Section -->
    <x-layouts.footer />

    <!-- AOS Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    </script>

    <!-- Scripts -->
    @stack('scripts')

</body>

</html>
