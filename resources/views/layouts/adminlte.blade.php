<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

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

<!-- Admin LTE 3 JS Dependencies -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}" defer></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}" defer></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}" defer></script>
<script src="{{asset('plugins/sparklines/sparkline.js')}}" defer></script>
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}" defer></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}" defer></script>
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}" defer></script>
<script src="{{asset('plugins/moment/moment.min.js')}}" defer></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}" defer></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}" defer></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}" defer></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}" defer></script>
<script src="{{asset('dist/js/adminlte.js')}}" defer></script>
<script src="{{asset('dist/js/pages/dashboard.js')}}" defer></script>

@stack('js')

</body>

</html>
