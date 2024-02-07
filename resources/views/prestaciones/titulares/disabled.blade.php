@extends('layouts.app')
@section('content')
<p class="text-end"><a href="{{ route('prestaciones.titulares.index') }}" class="btn btn-primary" role="button">Lista de Titulares</a></p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Prestaciones/Baja Titular
        </div>
        @if (session('msg_tipo'))
        <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- <div class="row m-3">
        <div class="col-md-3">
          <input wire:model="rfc_search"  type="text" class="form-control" placeholder="RFC" aria-label="First name">
        </div>
        <div class="col-md-3">
          <input wire:model="idcif" type="text" class="form-control" placeholder="idCif" aria-label="Last name">
        </div>
        <div class="col-md-3">
            <button wire:click="rfcBuscar" type="button" class="btn btn-success">Buscar</button>
          </div>
      </div> --}}
      <form class="row g-3 m-3" action="{{ url('prestaciones/titulares/baja/' . $titular->id) }}" method="POST">
        @method('PUT')
        @csrf
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
        <div class="col-12">
            <h3>Datos del Titular.</h3>
            <div class="col-md-4">
                <label class="form-label">Nombre del Titular</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$titular->last_name_1.' '.$titular->last_name_2.' '.$titular->name}}" disabled>
              </div>         
        </div>
        <div class="col-12">
        <div class="col-md-2">
          <label class="form-label">Fecha de Baja</label>
          <input type="date" class="form-control" id="fecha_baja" name="fecha_baja" required>
          @error('fecha_baja')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="col-md-3">
          <label class="form-label">Motivo de Baja</label>
          <select id="motivo_baja" name="motivo_baja" class="form-select" required >
            <option selected value="">Elige...</option>
            <option>Acta Administrativa</option>
            <option>Defunsión</option>
            <option>Pensión</option>
            <option>Renuncia</option>
          </select>
          @error('motivo_baja')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
    </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Guardar</button>
          <a href="{{ route('prestaciones.titulares.index') }}" class="btn btn-danger" role="button">Cancelar</a>
        </div>
      </form>
    </div>
@endsection