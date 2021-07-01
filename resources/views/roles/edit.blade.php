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
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Ver papel</h3>
        </div>
        <form action="{{ route('roles.update', $role) }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input value="{{ $role->name }}" type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="label">Label</label>
                    <input value="{{ $role->label }}" type="text" id="label" name="label" class="form-control" required>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('roles.index') }}" class="btn btn-primary">
                    Voltar
                </a>

                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </form>
    </div>

    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Permissões</h3>
        </div>
        <form action="{{ route('roles.update.permissions', $role) }}" method="POST">
            @csrf
            <div class="row card-body">
                @foreach($groupPermissions as $group => $permissions)
                    <p>{{ $group }}</p>
                    @foreach($permissions as $permission)
                        <div class="col-12">
                            <div class="form-check">
                                <input {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                    {{ $permission->label }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </form>
    </div>
@endsection
