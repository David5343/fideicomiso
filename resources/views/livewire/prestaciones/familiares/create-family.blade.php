<div>
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
<form wire:submit="guardar" class="row g-3 m-2">
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
    <h4>Busqueda del Titular</h4>
</div>
<div class="col-3">
  <div class="input-group mb-3">
    <input wire:model="busqueda" type="text" class="form-control" placeholder="Ingrese Número de Expediente">
    <button wire:click="buscar" class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
  </div>
</div>
<div class="mb-3 row">
  <label for="inputPassword" class="col-sm-2 col-form-label">Nombre Completo</label>
  <div class="col-sm-4">
    <input wire:model="nombre_afiliado" type="text" class="form-control" id="nombre_afiliado" name="nombre_afiliado" disabled>
    <input wire:model="hidden_id" type="hidden" id="hidden_id" name="hidden_id" value="{{$hidden_id}}">
  </div>
</div>
<div class="mb-3 row">
  <label for="inputPassword" class="col-sm-2 col-form-label">RFC</label>
  <div class="col-sm-3">
    <input wire:model="rfc_afiliado" type="text" class="form-control" id="rfc_afiliado" name="rfc_afiliado" disabled>
  </div>
</div>
<div class="col-12">
  @if (session('msg_tipo'))
  <div class="alert alert-{{session('msg_tipo')}} alert-dismissible fade show m-4 p-4" role="alert">
    <h4 class="alert-heading">Pigd <i class="bi bi-check-circle"></i></h4>
    <p><strong>{{ session('msg')}}</strong></p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  </div> 
<div class="col-12">
  @if (session('msg_tipo_busqueda'))
  <div class="alert alert-{{ session('msg_tipo_busqueda') }} alert-dismissible fade show m-1 p-3" role="alert">
      {{ session('msg_busqueda') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
</div>
<div class="col-12">
    <h4>Datos del Familiar.</h4>
    <h6>(*) Campos Obligatorios</h6>
</div>
<div class="col-md-2">
  <label  class="form-label">* No de Expediente</label>
  <input type="text" class="form-control" id="no_expediente" name="no_expediente" value="{{$num_expediente}}" disabled>
  <input wire:modal="expediente_hidden" type="hidden" id="expediente_hidden" name="expediente_hidden" value="{{$num_expediente}}">
  @error('expediente_hidden')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-2">
  <label  class="form-label">* Fecha de Ingreso</label>
  <input wire:model="fecha_ingreso" type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso"
  maxlength="10" value="{{old('fecha_ingreso')}}">
  @error('fecha_ingreso')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-4">
  <label  class="form-label">* Apellido Paterno (Primer Apellido)</label>
  <input wire:model="apaterno" type="text" class="form-control" id="apaterno" name="apaterno"
  maxlength="20" value="{{old('apaterno')}}">
  @error('apaterno')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-4">
  <label  class="form-label">Apellido Materno (Segundo Apellido)</label>
  <input wire:model="amaterno" type="text" class="form-control" id="amaterno" name="amaterno"
  maxlength="20" value="{{old('amaterno')}}">
  @error('amaterno')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-3">
    <label  class="form-label">* Nombre</label>
    <input wire:model="nombre" type="text" class="form-control" id="nombre" name="nombre"
    maxlength="30" value="{{old('nombre')}}">
    @error('nombre')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-3">
    <label  class="form-label">* Fecha de Nacimiento</label>
    <input wire:model="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
    maxlength="10" value="{{old('fecha_nacimiento')}}">
    @error('fecha_nacimiento')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-2">
    <label class="form-label">* Sexo</label>
    <select wire:model="sexo" id="sexo" name="sexo" class="form-select" >
      <option selected>Elije...</option>
      <option value="Hombre"{{old('sexo' == "Hombre" ? 'selected' : '')}}>Hombre</option>
      <option value="Mujer"{{old('sexo' == "Mujer" ? 'selected' : '')}}>Mujer</option>
    </select>
    @error('sexo')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-3">
    <label  class="form-label">RFC</label>
    <input wire:model="rfc" type="text" class="form-control" id="rfc" name="rfc" maxlength="13"
     value="{{old('rfc')}}">
    @error('rfc')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-3">
    <label  class="form-label">CURP</label>
    <input wire:model="curp" type="text" class="form-control" id="curp" name="curp" maxlength="18"
     value="{{old('curp')}}">
    @error('curp')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">* ¿Con Diversas Capacidades?</label>
    <select wire:model="persona_discapacitada" id="persona_discapacitada" name="persona_discapacitada" class="form-select">
      <option value="" selected>Elije...</option> 
      <option>SI</option>
      <option>NO</option>       
    </select>
    @error('persona_discapacitada')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">* Parentesco</label>
    <select wire:model="parentesco" id="parentesco" name="parentesco" class="form-select">
      <option selected value="">Elije...</option>
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
    <input wire:model="direccion" type="text" class="form-control" id="direccion" name="direccion"
    maxlength="150"  value="{{old('direccion')}}">
    @error('direccion')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>   
  <div class="col-md-12">
    <label  class="form-label">Observaciones</label>
    <textarea wire:model="observaciones" id="observaciones" name="observaciones" class="form-control form-control-lg" 
    rows="2"></textarea>
    @error('observaciones')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div>   
  <div class="col-12">
    <h4>Datos Bancarios</h4>
</div>
<div class="col-md-4">
    <label  class="form-label">Numero de Cuenta</label>
    <input wire:model="num_cuenta" type="number" class="form-control" id="num_cuenta" name="num_cuenta"
    maxlength="10"  value="{{old('num_cuenta')}}">
    @error('num_cuenta')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div> 
  <div class="col-md-4">
    <label  class="form-label">CLABE</label>
    <input wire:model="clabe" type="number" class="form-control" id="clabe" name="clabe"
    maxlength="18" value="{{old('clabe')}}">
    @error('clabe')<br><small style="color: red">{{ $message }}</small>
    @enderror
  </div> 
  <div class="col-md-4">
    <label class="form-label">Institución Bancaria</label>
    <select wire:model="banco_id"  class="form-select" id="banco_id" name="banco_id" >
      <option selected value="">Elije...</option>
      @foreach($select4 as $b)
      <option value="{{$b->id}}">{{$b->name}}</option>
      @endforeach
  </select>
  @error('banco_id')<br><small style="color: red">{{ $message }}</small>
  @enderror
  </div>
  <div class="col-12">
    <h4>Datos Representante Legal.</h4>
</div> 
<div class="col-md-4">
  <label  class="form-label">Nombre Completo</label>
  <input wire:model="nombre_representante" type="text" class="form-control" id="nombre_representante" name="nombre_representante"
  maxlength="50" value="{{old('nombre_representante')}}">
  @error('nombre_representante')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-3">
  <label  class="form-label">RFC</label>
  <input wire:model="rfc_representante" type="text" class="form-control" id="rfc_representante" name="rfc_representante"
  maxlength="13" value="{{old('rfc_representante')}}">
  @error('rfc_representante')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-3">
  <label  class="form-label">CURP</label>
  <input wire:model="curp_representante" type="text" class="form-control" id="curp_representante" name="curp_representante"
  maxlength="18" value="{{old('curp_representante')}}">
  @error('curp_representante')<br><small style="color: red">{{ $message }}</small>
  @enderror
</div>
<div class="col-md-3">
  <label class="form-label">Parentesco</label>
  <select wire:model="parentesco_representante" id="parentesco_representante" name="parentesco_representante" class="form-select" >
    <option selected>Elije...</option>
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
  @if (session('msg_tipo'))
  <div class="alert alert-{{session('msg_tipo')}} alert-dismissible fade show m-4 p-4" role="alert">
    <h4 class="alert-heading">Pigd <i class="bi bi-check-circle"></i></h4>
    <p><strong>{{ session('msg')}}</strong></p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  </div>      
<div class="col-12">
  <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Guardar</button>
  <a href="{{ route('prestaciones.familiares.index') }}" class="btn btn-danger" role="button">Cancelar</a>
  <div class="d-flex justify-content-center">
    <div wire:loading wire:target='guardar' class="spinner-border text-success" style="width:3rem; height: 3rem;"  role="status">
      <span class="visually-hidden">Guardando...</span>
    </div>
  </div>
</div>
</form>
</div>