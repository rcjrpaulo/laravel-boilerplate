<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')

</head>

<body>
<div id="app" class="bg-gray-100">
    <header>
        @include('layouts.header')
    </header>

    @include('layouts.alert')

    <main class="container py-5">
        @yield('main')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@stack('js')

</body>

</html>
