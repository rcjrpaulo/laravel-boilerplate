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
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nome</label>
                <input value="{{ $role->name }}" type="text" id="name" name="name" class="form-control" required disabled>
            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input value="{{ $role->label }}" type="text" id="label" name="label" class="form-control" required disabled>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('roles.index') }}" class="btn btn-primary">
                Voltar
            </a>
        </div>
    </div>
@endsection
