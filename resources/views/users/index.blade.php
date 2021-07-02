@extends('layouts.adminlte')

@section('main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="#" method="GET">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">Filtros</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input name="name" id="name" type="text" class="form-control" value="{{ request()->get('name', '') }}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="items_per_page">Itens por página</label>
                                            <input name="items_per_page" id="items_per_page" type="number" min="1" class="form-control" value="{{ request()->get('items_per_page', '20') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info text-center">Filtrar</button>
                                <a href="{{ route('users.index') }}" class="btn btn-warning">Limpar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="card-header">
                            <h3 class="card-title">Usuários</h3> <div class="card-tools">
                                @can('create_users')
                                    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                                        Adicionar
                                    </a>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Papel</th>
                                    <th>Data Criação</th>
                                    <th style="width: 150px;">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name ?? 'Sem Papel' }}</td>
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a title="Ver" href="{{ route('users.show', $user) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i></a>

                                            @can('update_users')
                                                <a title="Editar" href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a>
                                            @endcan

                                            @can('delete_users')
                                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="confirm-delete" style="display: contents">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Deletar" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="mt-6 -mb-1 flex flex-wrap">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
