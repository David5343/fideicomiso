@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('humanos.bancos.index') }}" class="btn btn-secondarry" role="button">Lista de Categorias</a>
    </p>
    <div class="card mt-1" style="border-color:#333333">
        <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
            Humanos/Editar Categoria
        </div>
        <div class="card-body p-3">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <form action="{{ url('humanos/categorias/' . $categoria->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-lg" id="nombre" name="nombre"
                            value="{{ $categoria->name }}" minlength="5" maxlength="50" required>
                        @error('nombre')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Sueldo</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control form-control-lg" id="sueldo" name="sueldo"
                            value="{{ $categoria->salary }}" min="0" max="9999999999.99" step="0.01" required>
                        @error('sueldo')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Compensación</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control form-control-lg" id="compensacion" name="compensacion"
                            value="{{ $categoria->compensation }}" min="0" max="9999999999.99" step="0.01"
                            required>
                        @error('compensacion')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Complementaria</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control form-control-lg" id="complementaria" name="complementaria"
                            value="{{ $categoria->complementary }}" min="0" max="9999999999.99" step="0.01"
                            required>
                        @error('complementaria')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">ISR</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control form-control-lg" id="isr" name="isr"
                            value="{{ $categoria->isr }}" min="0" max="9999999999.99" step="0.01" required>
                        @error('isr')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Plazas Autorizadas</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control form-control-lg" id="plazas_autorizadas"
                            name="plazas_autorizadas" value="{{ $categoria->authorized_places }}" min="1"
                            max="51" required>
                        @error('plazas_autorizadas')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('humanos.estados.index') }}" class="btn btn-danger" role="button">Cancelar</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
