@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('humanos.bancos.index') }}" class="btn btn-secondary" role="button">Lista de Plazas</a>
    </p>
    <div class="card mt-1" style="border-color:#333333">
        <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
            Humanos/Editar Plaza
        </div>
        <div class="card-body p-3">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <form action="{{ url('humanos/plazas/' . $plaza->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">No. de Plaza</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-lg" id="num_plaza" name="num_plaza"
                            value="{{ $plaza->place_number }}" minlength="3" maxlength="50" required>
                        @error('num_plaza')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Puesto</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-lg" id="puesto" name="puesto"
                            value="{{ $plaza->job_position }}" minlength="3" maxlength="50" required>
                        @error('puesto')
                            <br><small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Categoria</label>
                    <div class="col-sm-4">
                        <select class="form-select form-select-lg mb-3" id="categoria_id" name="categoria_id">
                            <option selected value="{{ $plaza->category->id }}">{{ $plaza->category->name }}</option>
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
                        <a href="{{ route('humanos.plazas.index') }}" class="btn btn-danger" role="button">Cancelar</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
