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
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Criar usuário</h3>
        </div>
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="role_id">Papel</label>
                    <select id="role_id" name="role_id" class="form-control" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="photo">Foto</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" id="photo" name="photo" class="custom-file-input">
                            <label for="photo" class="custom-file-label">Escolha uma foto</label>
                        </div>
                    </div>
                    <div class="preview mt-3"></div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-primary">
                    Voltar
                </a>
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </form>
    </div>
@endsection
