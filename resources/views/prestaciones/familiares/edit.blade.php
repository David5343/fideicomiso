@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('prestaciones.familiares.index') }}" class="btn btn-primary" role="button">Lista de Familiares</a>
    </p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Prestaciones/Editar Familiar
        </div>
        <div class="card-body p-3">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
<form class="row g-3 m-3" action="{{ url('prestaciones/familiares/'.$familiar->id) }}" method="POST">
    @method('PUT')
    @csrf
<div class="col-12">
    <h3>Datos del Familiar.</h3>
    <h6>(*) Campos Obligatorios</h6>
</div>
<div class="col-md-2">
  <label  class="form-label">* No de Expediente</label>
  <input type="text" class="form-control" id="no_expediente" name="no_expediente" minlength="2" maxlength="8" value="{{$familiar->file_number}}" disabled>
  <input type="hidden" id="expediente_hidden" name="expediente_hidden" value="{{$familiar->file_number}}">
  @error('expediente_hidden')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-2">
  <label  class="form-label">* Fecha de Ingreso</label>
  <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{$familiar->start_date}}" required>
  @error('fecha_ingreso')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-2">
  <label  class="form-label">* Apellido Paterno</label>
  <input  type="text" class="form-control" id="apaterno" name="apaterno" minlength="2" maxlength="20" value="{{$familiar->last_name_1}}" required>
  @error('apaterno')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-2">
  <label  class="form-label">* Apellido Materno</label>
  <input type="text" class="form-control" id="amaterno" name="amaterno" minlength="2" maxlength="20" value="{{$familiar->last_name_2}}" required>
  @error('amaterno')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-3">
    <label  class="form-label">* Nombre</label>
    <input  type="text" class="form-control" id="nombre" name="nombre" minlength="2" maxlength="20" value="{{$familiar->name}}" required>
    @error('nombre')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-3">
    <label  class="form-label">* Fecha de Nacimiento</label>
    <input  type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$familiar->birthday}}" required>
    @error('fecha_nacimiento')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-2">
    <label class="form-label">* Sexo</label>
    <select  id="sexo" name="sexo" class="form-select" >
      <option selected value="{{$familiar->sex}}">{{$familiar->sex}}</option>
      <option value="Hombre"{{old('sexo' == "Hombre" ? 'selected' : '')}}>Hombre</option>
      <option value="Mujer"{{old('sexo' == "Mujer" ? 'selected' : '')}}>Mujer</option>
    </select>
    @error('sexo')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-3">
    <label  class="form-label">* RFC</label>
    <input wire:model="rfc" type="text" class="form-control" id="rfc" name="rfc" size="13" value="{{$familiar->rfc}}" required>
    @error('rfc')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-3">
    <label  class="form-label">* CURP</label>
    <input wire:model="curp" type="text" class="form-control" id="curp" name="curp" size="18" value="{{$familiar->curp}}" required>
    @error('curp')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">* ¿Con Diversas Capacidades?</label>
    <select wire:model="persona_discapacitada" id="persona_discapacitada" name="persona_discapacitada" class="form-select" value="{{old('persona_discapacitada')}}" required>
      <option selected value="{{$familiar->disabled_person}}">{{$familiar->disabled_person}}</option>
      <option>SI</option>
      <option>NO</option>
      
    </select>
    @error('persona_discapacitada')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">* Parentesco</label>
    <select  id="parentesco" name="parentesco" class="form-select" required>
      <option selected value="{{$familiar->relationship}}">{{$familiar->relationship}}</option>
      <option value="Padre"{{old('parentesco' == "Padre" ? 'selected' : '')}}>Padre</option>
      <option value="Madre"{{old('parentesco' == "Madre" ? 'selected' : '')}}>Madre</option>
      <option value="Esposa"{{old('parentesco' == "Esposa" ? 'selected' : '')}}>Esposa</option>
      <option value="Hijo/a"{{old('parentesco' == "Hijo/a" ? 'selected' : '')}}>Hijo/a</option>
      <option value="Concubina"{{old('parentesco' == "Concubina" ? 'selected' : '')}}>Concubina</option>
    </select>
    @error('parentesco')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>   
  <div class="col-md-10">
    <label  class="form-label">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" maxlength="100" value="{{$familiar->address}}" required>
    @error('direccion')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>   
  <div class="col-md-12">
    <label  class="form-label">Observaciones</label>
    <textarea id="observaciones" name="observaciones" class="form-control form-control-lg" maxlength="150"
    rows="2">{{$familiar->observations}}</textarea>
    @error('observaciones')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>   
  <div class="col-12">
    <h3>Datos Bancarios</h3>
</div>
<div class="col-md-4">
    <label  class="form-label">Numero de Cuenta</label>
    <input type="number" class="form-control" id="num_cuenta" name="num_cuenta" size="10" value="{{$familiar->account_number}}">
    @error('num_cuenta')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div> 
  <div class="col-md-4">
    <label  class="form-label">CLABE</label>
    <input  type="number" class="form-control" id="clabe" name="clabe" size="18" value="{{$familiar->clabe}}">
    @error('clabe')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div> 
  <div class="col-md-4">
    <label class="form-label">Institución Bancaria</label>
    <select class="form-select" id="banco_id" name="banco_id" >
      <option selected value="@if($familiar->bank != null){{$familiar->bank->id}}@endif">@if($familiar->bank != null){{$familiar->bank->name}}@endif</option>
      @foreach($select4 as $b)
      <option value="{{$b->id}}">{{$b->name}}</option>
      @endforeach
  </select>
  @error('banco_id')<br><small style="color: red">{{ $message }}</small>
  @enderror
  </div>
  <div class="col-12">
    <h3>Datos Representante Legal.</h3>
</div> 
<div class="col-md-4">
  <label  class="form-label">Nombre Completo</label>
  <input  type="text" class="form-control" id="nombre_representante" name="nombre_representante" minlength="5" maxlength="40" value="{{$familiar->representative_name}}">
  @error('nombre_representante')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-3">
  <label  class="form-label">RFC</label>
  <input  type="text" class="form-control" id="rfc_representante" name="rfc_representante" size="13" value="{{$familiar->representative_rfc}}">
  @error('rfc_representante')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-3">
  <label  class="form-label">CURP</label>
  <input  type="text" class="form-control" id="curp_representante" name="curp_representante" size="18" value="{{$familiar->representative_curp}}">
  @error('curp_representante')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-3">
  <label class="form-label">Parentesco</label>
  <select  id="parentesco_representante" name="parentesco_representante" class="form-select" >
    <option selected value="@if($familiar->representative_relationship != null){{$familiar->representative_relationship}}@endif">@if($familiar->representative_relationship != null){{$familiar->representative_relationship}}@endif</option>
    <option value="Padre" {{old('parentesco_representante') == "Padre" ? 'selected' : ''}}>Padre</option>
    <option value="Madre" {{old('parentesco_representante') == "Madre" ? 'selected' : ''}}>Madre</option>
    <option value="Esposo/a" {{old('parentesco_representante') == "Esposo/a" ? 'selected' : ''}}>Esposo/a</option>
    <option value="Hijo/a" {{old('parentesco_representante') == "Hijo/a" ? 'selected' : ''}}>Hijo/a</option>
    <option value="Nieto/a" {{old('parentesco_representante') == "Nieto/a" ? 'selected' : ''}}>Nieto/a</option>
    <option value="Hermano/a" {{old('parentesco_representante') == "Hermano/a" ? 'selected' : ''}}>Hermano/a</option>
  </select>
  @error('parentesco_representante')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>   
<div class="col-12">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="{{ route('prestaciones.familiares.index') }}" class="btn btn-danger" role="button">Cancelar</a>
</div>
</form>
</div>
</div>
@endsection
