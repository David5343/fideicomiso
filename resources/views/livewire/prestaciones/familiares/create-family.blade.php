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
<form class="row g-3 m-3" action="{{ route('prestaciones.familiares.store') }}" method="POST" >
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
<div class="col-12">
    <h3>Busqueda</h3>
</div>
<div class="col-10">
  <div class="input-group mb-3">
    <input wire.model="expediente" type="text" class="form-control" placeholder="Recipient's username">
    <button wire:click="buscar" class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
  </div>
</div>
<div class="mb-3 row">
  <label for="inputPassword" class="col-sm-2 col-form-label">Nombre Completo</label>
  <div class="col-sm-8">
    <input wire.model="nombre_afiliado" type="text" class="form-control" id="nombre_afiliado" name="nombre_afiliado" value="{{$nombre_afiliado}}">
  </div>
</div>
<div class="col-12">
    <h3>Datos del Familiar.</h3>
</div>
<div class="col-md-2">
  <label  class="form-label">Apellido Paterno</label>
  <input type="text" class="form-control" id="apaterno" name="apaterno" minlength="2" maxlength="20" value="{{old('apaterno')}}" >
  @error('apaterno')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-2">
  <label  class="form-label">Apellido Materno</label>
  <input type="text" class="form-control" id="amaterno" name="amaterno" minlength="2" maxlength="20" value="{{old('amaterno')}}" >
  @error('amaterno')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-3">
    <label  class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" minlength="2" maxlength="20" value="{{old('nombre')}}" >
    @error('nombre')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>         
<div class="col-12">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="{{ route('prestaciones.familiares.index') }}" class="btn btn-danger" role="button">Cancelar</a>
</div>
</form>