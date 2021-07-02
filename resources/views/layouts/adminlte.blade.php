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
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-white">Sair</button>
                    </form>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light">
                    <img loading="lazy" src="{{ asset('dist/img/AdminLTELogo.png') }}" width="50">
                </span>
            </a>
            <div class="sidebar"><div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ auth()->user()->photoUrl ?? 'images/profile.png' }}" alt="User Image" class="img-circle elevation-2">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" data-toggle="modal" data-target="#userPhotoModal">
                            {{ auth()->user()->name ?? 'Usuário não encontrado' }}
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul data-widget="treeview" role="menu" data-accordion="false" class="nav nav-pills nav-sidebar flex-column pt-2">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link my-2 text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        @can('read_users')
                            <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link my-2 text-white"><i class="nav-icon fas fa-user-alt"></i> <p>Usuários</p></a></li>
                        @endcan

                        @can('read_roles')
                            <li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link my-2 text-white"><i class="nav-icon fas fa-plus-square"></i> <p>Papéis</p></a></li>
                        @endcan
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
            <span class="text-muted"><span>Feito com muito</span> <span><i class="fa fa-heart text-danger"></i></span> <span>pela <a href="http://www.agily.com.br" target="_blank">Agily Tecnologia</a></span></span>
        </footer>

        <div id="sidebar-overlay"></div>
    </div>


    <footer>
        @include('layouts.footer')
    </footer>
</div>

<!-- Modal Atualizar User Photo -->
<div class="modal fade" id="userPhotoModal" tabindex="-1" role="dialog" aria-labelledby="userPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar Foto de Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('users.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 my-2">
                            <span>Foto atual</span>
                        </div>

                        <div class="col-12 my-2">
                            <div class="image">
                                <img width="30" src="{{ auth()->user()->photoUrl ?? '/images/profile.png' }}" alt="User Image" class="img-circle elevation-2">
                            </div>
                        </div>

                        <div class="col-12 my-2">
                            <input type="file" name="photo" class="form-control" required>
                        </div>

                        <div class="col-12 my-2">
                            <button type="submit" class="btn btn-success">Atualizar foto</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
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
<script>
    const forms = document.getElementsByClassName('confirm-delete')
    for (let form of forms) {
        form.addEventListener('submit', function(event) {
            event.preventDefault()

            Swal.fire({
                title: 'Você tem certeza ?',
                text: 'Você está prestes a excluir um registro.',
                icon: 'error',
                showDenyButton: true,
                confirmButtonText: 'Sim',
                denyButtonText: 'Não'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            })
        });
    }
</script>

</body>

</html>
