@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('humanos.bancos.index') }}" class="btn btn-primary" role="button">Lista de Bancos</a>
    </p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Humanos/Editar Banco
        </div>
        <div class="card-body p-3">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <form action="{{ url('humanos/bancos/' . $banco->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Clave</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control form-control-lg" id="clave" name="clave"
                            value="{{ $banco->key }}" minlength="3" maxlength="5" required>
                        @error('clave')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-lg" id="nombre" name="nombre"
                            value="{{ $banco->name }}" minlength="2" maxlength="40" required>
                        @error('nombre')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Razón Social</label>
                    <div class="col-sm-8">
                        <textarea class="form-control form-control-lg" id="razon_social" name="razon_social"
                         minlength="5" maxlength="120" rows="2" required>{{ $banco->legal_name }}</textarea>
                        @error('razon_social')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('humanos.bancos.index') }}" class="btn btn-danger" role="button">Cancelar</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
