@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('prestaciones.subdependencias.index') }}" class="btn btn-primary" role="button">Lista de Subdependencias</a>
    </p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Prestaciones/Editar Subdependencia
        </div>
        <div class="card-body p-3">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <form action="{{ url('prestaciones/subdependencias/' . $subdependencia->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-lg" id="nombre" name="nombre"
                            value="{{ $subdependencia->name }}" minlength="5" maxlength="60" required>
                        @error('nombre')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Dependencia</label>
                    <div class="col-sm-4">
                        <select class="form-select form-select-lg mb-3" id="dependencia_id" name="dependencia_id">
                            <option selected value="{{ $subdependencia->dependency->id }}">{{ $subdependencia->dependency->name }}</option>
                            @foreach ($select as $e)
                                <option value="{{ $e->id }}">{{ $e->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('prestaciones.subdependencias.index') }}" class="btn btn-danger" role="button">Cancelar</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
