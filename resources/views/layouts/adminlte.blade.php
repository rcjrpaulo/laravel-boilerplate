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
<div id="app">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item"><a data-widget="pushmenu" href="javascript:void(0)" role="button" class="nav-link"><i class="fas fa-bars"></i></a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-white">Sair</button>
                    </form>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="javascript:void(0)" class="brand-link">
                <span class="brand-text font-weight-light">
                    <img loading="lazy" src="dist/img/AdminLTELogo.png" width="50">
                </span>
            </a>
            <div class="sidebar"><div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" alt="User Image" class="img-circle elevation-2">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            admin
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul data-widget="treeview" role="menu" data-accordion="false" class="nav nav-pills nav-sidebar flex-column pt-2">
                        <li class="nav-item">
                            <a href="/" class="nav-link my-2 text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">PERMISSÕES</li>
                        <li class="nav-item"><a href="/admin/roles" class="nav-link my-2 text-white"><i class="nav-icon fas fa-plus-square"></i> <p>Papéis</p></a></li>
                        <li class="nav-item"><a href="/admin/users" class="nav-link my-2 text-white"><i class="nav-icon fas fa-user-alt"></i> <p>Usuários</p></a></li>
                    </ul>

                </nav>
            </div>
        </aside>

        <div class="content-wrapper" style="min-height: 594.375px;">
            <section class="content">
                @include('layouts.alert')
                @yield('main')
            </section>
        </div>

        <footer class="main-footer text-center">
            <span class="text-muted"><span>Feito com muito</span> <span><i class="fa fa-heart text-danger fa-pulse"></i></span> <span>pela <a href="http://www.agily.com.br" target="_blank">Agily Tecnologia</a></span></span>
        </footer>

        <div id="sidebar-overlay"></div>
    </div>


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
