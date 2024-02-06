@extends('layouts.app')
@section('content')
<p class="text-end"><a href="{{ route('humanos.empleados.index') }}" class="btn btn-primary" role="button">Lista de  Empleados</a></p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Humanos/Crear Empleado
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
    <form class="row g-3 m-3" action="{{ route('humanos.empleados.store') }}" method="POST" >
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
            <h3>Datos Generales.</h3>
        </div>
        <div class="col-md-3">
          <label class="form-label">Tipo de Contrato</label>
          <select id="tipo_contrato" name="tipo_contrato" class="form-select" >
            <option selected value="">Elije...</option>
            <option>Nombramiento</option>
            <option>Determinado</option>
          </select>
          @error('tipo_contrato')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-3">
          <label class="form-label">Tipo de Empleo</label>
          <select id="tipo_empleo" name="tipo_empleo" class="form-select" >
            <option selected value="">Elije...</option>
            <option>Estructura</option>
            <option>Eventual</option>
            <option>Permanente</option>
          </select>
          @error('tipo_empleo')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>   
        <div class="col-md-4">
          <label class="form-label">Area</label>
          <select  class="form-select" id="area_id" name="area_id" value="{{old('area_id')}}" >
            <option selected value="">Elije...</option>
            @foreach($select1 as $a)
            <option value="{{$a->id}}">{{$a->name}}</option>
            @endforeach
        </select>
        @error('area_id')<br><small style="color: red">{{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-4">
          <label class="form-label">Plaza</label>
          <select  class="form-select" id="plaza_id" name="plaza_id">
            <option selected value="">Elije...</option>
            @foreach($select2 as $p)
            <option value="{{$p->id}}">{{$p->place_number.'-'.$p->job_position}}</option>
            @endforeach
        </select>
        @error('plaza_id')<br><small style="color: red">{{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-3">
          <label class="form-label">Fecha de Ingreso</label>
          <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{old('fecha_ingreso')}}" >
          @error('fecha_ingreso')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-12">
            <h3>Datos Personales.</h3>
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
            <input type="text" class="form-control" id="nombre" name="nombre" minlength="2" maxlength="30" value="{{old('nombre')}}" >
            @error('nombre')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
        <div class="col-md-3">
            <label class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" >
            @error('fecha_nacimiento')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-5">
            <label  class="form-label">Lugar de Nacimiento</label>
            <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" minlength="5" maxlength="85" value="{{old('lugar_nacimiento')}}" >
            @error('lugar_nacimiento')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label class="form-label">Sexo</label>
            <select id="sexo" name="sexo" class="form-select" >
              <option selected value="">Elije...</option>
              <option>Hombre</option>
              <option>Mujer</option>
            </select>
            @error('sexo')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label class="form-label">Estado Civil</label>
            <select id="estado_civil" name="estado_civil" class="form-select" >
              <option selected value="">Elije...</option>
              <option>Soltero/a</option>
              <option>Casado/a</option>
              <option>Divorciado/a</option>
              <option>Unión Libre</option>
            </select>
            @error('estado_civil')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>   
          <div class="col-md-3">
            <label  class="form-label">RFC</label>
            <input type="text" class="form-control" id="rfc" name="rfc" size="13" value="{{old('rfc')}}" >
            @error('rfc')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">CURP</label>
            <input type="text" class="form-control" id="curp" name="curp" size="18" value="{{old('curp')}}" >
            @error('curp')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Telefono</label>
            <input type="phone" class="form-control" id="telefono" name="telefono" size="10" value="{{old('telefono')}}" >
            @error('telefono')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="50" value="{{old('email')}}" >
            @error('email')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12">
            <h3>Datos de Contacto de Emergencia.</h3>
        </div>
        <div class="col-4">
          <label  class="form-label">Nombre Completo</label>
          <input type="text" class="form-control" id="nombre_emergencia" name="nombre_emergencia" minlength="2" maxlength="50" value="{{old('nombre_emergencia')}}" >
          @error('nombre_emergencia')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-2">
          <label  class="form-label">Numero de Emergencia</label>
          <input type="phone" class="form-control" id="num_emergencia" name="num_emergencia" size="10" value="{{old('num_emergencia')}}" >
          @error('num_emergencia')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-6">
          <label  class="form-label">Dirección</label>
          <input type="text" class="form-control" id="direccion_emergencia" name="direccion_emergencia" minlength="2" maxlength="50" value="{{old('direccion_emergencia')}}" >
          @error('direccion_emergencia')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
          <div class="col-12">
            <h3>Dirección</h3>
        </div>
        <div class="col-md-3">
            <label class="form-label">Entidad Federativa</label>
            <input type="text" class="form-control" list="datalistEstados" id="estado" name="estado" minlength="3" maxlength="85" value="{{old('estado')}}">
            <datalist id="datalistEstados">
              @foreach($select3 as $e)
              <option value="{{$e->name}}">
              @endforeach   
            </datalist>
            @error('estado')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">Municipio o Delegación</label>
            <input type="text" class="form-control" list="datalistMunicipios"  id="municipio" name="municipio" minlength="3" maxlength="85" value="{{old('municipio')}}">
            <datalist id="datalistMunicipios">
              @foreach($select4 as $m)
              <option value="{{$m->name}}">
              @endforeach   
            </datalist>
            @error('municipio')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Colonia</label>
            <input type="text" class="form-control" id="colonia" name="colonia" minlength="3" maxlength="50"  value="{{old('colonia')}}" >
            @error('colonia')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Tipo de Vialidad</label>
            <input type="text" class="form-control" id="tipo_vialidad" name="tipo_vialidad" minlength="3" maxlength="50" value="{{old('tipo_vialidad')}}" >
            @error('tipo_vialidad')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Nombre de la Vialidad(Calle)</label>
            <input type="text" class="form-control" id="calle" name="calle" minlength="3" maxlength="50" value="{{old('calle')}}" >
            @error('calle')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label  class="form-label">No. de Exterior</label>
            <input type="number" class="form-control" id="num_exterior" name="num_exterior" max="20000" value="{{old('num_exterior')}}" >
          </div>
          <div class="col-md-2">
            <label  class="form-label">No. de Interior</label>
            <input type="number" class="form-control" id="num_interior" name="num_interior" value="{{old('num_interior')}}" max="20000">
            @error('num_interior')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-1">
            <label  class="form-label">CP</label>
            <input type="number" class="form-control" id="cp" name="cp" min="20000" max="99999"  value="{{old('cp')}}" >
            @error('cp')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label  class="form-label">Localidad</label>
            <input type="text" class="form-control" id="localidad" name="localidad" minlength="5" maxlength="85"  value="{{old('localidad')}}" >
            @error('localidad')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-12">
            <h3>Datos Bancarios</h3>
        </div>
        <div class="col-md-4">
            <label  class="form-label">Numero de Cuenta</label>
            <input type="number" class="form-control" id="num_cuenta" name="num_cuenta" maxlength="10"  value="{{old('num_cuenta')}}" >
            @error('num_cuenta')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label  class="form-label">CLABE</label>
            <input type="number" class="form-control" id="clabe" name="clabe" maxlength="18" value="{{old('clabe')}}" >
            @error('clabe')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label class="form-label">Institución Bancaria</label>
            <select  class="form-select" id="banco_id" name="banco_id" >
              <option selected value="NULL">Elije...</option>
              @foreach($select5 as $b)
              <option value="{{$b->id}}">{{$b->name}}</option>
              @endforeach
          </select>
          @error('banco_id')<br><small style="color: red">{{ $message }}</small>
          @enderror
          </div>          
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <a href="{{ route('humanos.empleados.index') }}" class="btn btn-danger" role="button">Cancelar</a>
        </div>
      </form>
    </div>
@endsection