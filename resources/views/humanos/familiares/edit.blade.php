@extends('layouts.app')
@section('content')
<p class="text-end"><a href="{{ route('humanos.familiares.index') }}" class="btn btn-primary" role="button">Lista de Familiares</a></p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Humanos/Editar Familiar
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
    <form class="row g-3 m-3" action="{{ url('humanos/familiares/'.$fam->id) }}" method="POST" >
      @method("PUT")
      @csrf
      {{-- @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif --}}
  <div>
        <div class="col-md-12 mb-3">
          <h3>
              Familiares.
              <small class="text-muted">Editando familiar de
                  {{ $empleado->name . ' ' . $empleado->last_name_1 . ' ' . $empleado->last_name_2 }}</small>
          </h3>
          <input type="hidden" class="form-control" id="empleado_id" name="empleado_id"
          value="{{ $fam->employee_id }}" required>
      </div>
        <div class="col-md-3">
          <label  class="form-label">Apellido Paterno</label>
          <input type="text" class="form-control" id="apaterno" name="apaterno" minlength="2" maxlength="20" value="{{$fam->last_name_1}}" >
          @error('apaterno')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-3">
          <label  class="form-label">Apellido Materno</label>
          <input type="text" class="form-control" id="amaterno" name="amaterno" minlength="2" maxlength="20" value="{{$fam->last_name_2}}" >
          @error('amaterno')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-5">
            <label  class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" minlength="2" maxlength="20" value="{{$fam->name}}" >
            @error('nombre')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
        <div class="col-md-2">
          <label class="form-label">Fecha de Ingreso</label>
          <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{$fam->start_date}}" >
          @error('fecha_ingreso')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
          <div class="col-md-3">
            <label  class="form-label">CURP</label>
            <input type="text" class="form-control" id="curp" name="curp" size="18" value="{{$fam->curp}}" >
            @error('curp')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label class="form-label">Parentesco</label>
            <select id="parentesco" name="parentesco" class="form-select" >
              <option selected value="{{$fam->relationship}}">{{$fam->relationship.' (Seleccionado)'}}</option>
              <option>Padre</option>
              <option>Madre</option>
              <option>Esposa</option>
              <option>Hijo</option>
              <option>Hija</option>
            </select>
            @error('sexo')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>  
          </div>          
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <a href="{{ route('humanos.familiares.index') }}" class="btn btn-danger" role="button">Cancelar</a>
        </div>
      </form>
    </div>
    </div>
@endsection