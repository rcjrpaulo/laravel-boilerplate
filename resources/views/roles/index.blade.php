@extends('layouts.adminlte')

@section('main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}">Papéis</a></li>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="filter_name">Label</label>
                                            <input name="label" id="label" type="text" class="form-control" value="{{ request()->get('label', '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info text-center">Filtrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="card-header">
                            <h3 class="card-title">Papéis</h3> <div class="card-tools">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    Adicionar
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Label</th>
                                    <th>Data Criação</th>
                                    <th style="width: 150px;">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->label }}</td>
                                        <td>{{ $role->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a title="Ver" href="{{ route('roles.show', $role) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i></a>
                                            <a title="Editar" href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display: contents">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Deletar" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
