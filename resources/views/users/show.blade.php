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
            <h3 class="card-title">Ver usuário</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nome</label>
                <input value="{{ $user->name }}" type="text" id="name" name="name" class="form-control" required disabled>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $user->email }}" type="email" id="email" name="email" class="form-control" required disabled>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input value="" type="password" id="password" name="password" class="form-control" required disabled>
            </div>

            <div class="form-group">
                <label for="role_id">Papel</label>
                <input value="{{ $user->role->label ?? 'Sem Papel' }}" type="text" id="role_id" name="role_id" class="form-control" required disabled>
            </div>

            <div class="form-group">
                <label for="photo">Foto</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input value="{{ $user->id }}" type="file" id="photo" name="photo" class="custom-file-input" disabled>
                        <label for="photo" class="custom-file-label">Escolha uma foto</label>
                    </div>
                </div>
                <div class="preview mt-3">
                    <img src="{{ $user->photoUrl ?? 'images/profile.png' }}" width="70" height="70" alt="User Image" class="img-circle elevation-2 mx-auto">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
                Voltar
            </a>
        </div>
    </div>
@endsection
