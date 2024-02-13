@extends('layouts.app')
@section('content')
<p class="text-end"><a href="{{ route('humanos.empleados.index') }}" class="btn btn-secondary" role="button">Lista de  Empleados</a></p>
<div class="card mt-1" style="border-color:#333333">
  <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
            Humanos/Editar Empleado
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
    <form class="row g-3 m-3" action="{{ url('humanos/empleados/'.$empleado->id) }}" method="POST" >
      @method("PUT")
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
            <h3>Datos Generales.</h3>
        </div>
        <div class="col-md-3">
          <label class="form-label">Tipo de Contrato</label>
          <select id="tipo_contrato" name="tipo_contrato" class="form-select" >
            <option selected value="{{$empleado->contract_type}}">{{$empleado->contract_type.' (Seleccionado)'}}</option>
            <option>Nombramiento</option>
            <option>Determinado</option>
          </select>
          @error('tipo_contrato')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-3">
          <label class="form-label">Tipo de Empleo</label>
          <select id="tipo_empleo" name="tipo_empleo" class="form-select" >
            <option selected value="{{$empleado->job_type}}">{{$empleado->job_type.' (Seleccionado)'}}</option>
            <option>Estructura</option>
            <option>Eventual</option>
            <option>Permanente</option>
          </select>
          @error('tipo_empleo')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>        
        <div class="col-md-4">
          <label class="form-label">Area</label>
          <select  class="form-select" name="area_id" value="{{old('area_id')}}" >
            <option selected value="{{$empleado->area_id}}">{{$empleado->area->name.' (Seleccionado)'}}</option>
            @foreach($select1 as $a)
            <option value="{{$a->id}}">{{$a->name}}</option>
            @endforeach
        </select>
        @error('area_id')<br><small style="color: red">{{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-4">
          <label class="form-label">Plaza</label>
          <input type="hidden" value="{{$empleado->place_id}}" id="hidden_plaza"name="hidden_plaza">
          <select  class="form-select" name="plaza_id" disabled>
            <option selected value="{{$empleado->place_id}}">{{$empleado->place->place_number.'-'.$empleado->place->job_position.' (Seleccionado)'}}</option>
            @foreach($select2 as $p)
            <option value="{{$p->id}}">{{$p->place_number.'-'.$p->job_position}}</option>
            @endforeach
        </select>
        @error('plaza_id')<br><small style="color: red">{{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-3">
          <label class="form-label">Fecha de Ingreso</label>
          <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{$empleado->start_date}}" >
          @error('fecha_ingreso')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-12">
            <h3>Datos Personales.</h3>
        </div>
        <div class="col-md-3">
          <label  class="form-label">Apellido Paterno</label>
          <input type="text" class="form-control" id="apaterno" name="apaterno" minlength="2" maxlength="20" value="{{$empleado->last_name_1}}" >
          @error('apaterno')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-3">
          <label  class="form-label">Apellido Materno</label>
          <input type="text" class="form-control" id="amaterno" name="amaterno" minlength="2" maxlength="20" value="{{$empleado->last_name_2}}" >
          @error('amaterno')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-5">
            <label  class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" minlength="2" maxlength="30" value="{{$empleado->name}}" >
            @error('nombre')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
        <div class="col-md-3">
            <label class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$empleado->birthday}}" >
            @error('fecha_nacimiento')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-5">
            <label  class="form-label">Lugar de Nacimiento</label>
            <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" minlength="5" maxlength="85" value="{{$empleado->birthplace}}" >
            @error('lugar_nacimiento')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">Sexo</label>
            <select id="sexo" name="sexo" class="form-select" >
              <option selected value="{{$empleado->sex}}">{{$empleado->sex.' (Seleccionado)'}}</option>
              <option>Hombre</option>
              <option>Mujer</option>
            </select>
            @error('sexo')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">Estado Civil</label>
            <select id="estado_civil" name="estado_civil" class="form-select" >
              <option selected value="{{$empleado->marital_status}}">{{$empleado->marital_status.' (Seleccionado)'}}</option>
              <option>Soltero/a</option>
              <option>Casado/a</option>
              <option>Divorciado/a</option>
            </select>
            @error('estado_civil')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>            
          <div class="col-md-3">
            <label  class="form-label">RFC</label>
            <input type="text" class="form-control" id="rfc" name="rfc" size="13" value="{{$empleado->rfc}}" >
            @error('rfc')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">CURP</label>
            <input type="text" class="form-control" id="curp" name="curp" size="18" value="{{$empleado->curp}}" >
            @error('curp')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Telefono</label>
            <input type="phone" class="form-control" id="telefono" name="telefono" size="10" value="{{$empleado->phone}}" >
            @error('telefono')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="50" value="{{$empleado->email}}" >
            @error('email')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12">
            <h3>Datos de Contacto de Emergencia.</h3>
        </div>
        <div class="col-4">
          <label  class="form-label">Nombre Completo</label>
          <input type="text" class="form-control" id="nombre_emergencia" name="nombre_emergencia" minlength="2" maxlength="30" value="{{$empleado->emergency_name}}" >
          @error('nombre_emergencia')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-2">
          <label  class="form-label">Numero de Emergencia</label>
          <input type="phone" class="form-control" id="num_emergencia" name="num_emergencia" size="10" value="{{$empleado->emergency_number}}" >
          @error('num_emergencia')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-6">
          <label  class="form-label">Dirección</label>
          <input type="text" class="form-control" id="direccion_emergencia" name="direccion_emergencia" minlength="2" maxlength="40" value="{{$empleado->emergency_address}}" >
          @error('direccion_emergencia')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
          <div class="col-12">
            <h3>Dirección</h3>
        </div>
        <div class="col-md-3">
            <label class="form-label">Entidad Federativa</label>
            <input type="text" class="form-control" list="datalistEstados" id="estado" name="estado" minlength="3" maxlength="85" value="{{$empleado->state}}">
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
            <input type="text" class="form-control" list="datalistMunicipios"  id="municipio" name="municipio" minlength="3" maxlength="85" value="{{$empleado->county}}">
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
            <input type="text" class="form-control" id="colonia" name="colonia" minlength="3" maxlength="50"  value="{{$empleado->neighborhood}}" >
            @error('colonia')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Tipo de Vialidad</label>
            <input type="text" class="form-control" id="tipo_vialidad" name="tipo_vialidad" minlength="3" maxlength="50" value="{{$empleado->roadway_type}}" >
            @error('tipo_vialidad')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Nombre de la Vialidad(Calle)</label>
            <input type="text" class="form-control" id="calle" name="calle" minlength="3" maxlength="50" value="{{$empleado->street}}" >
            @error('calle')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label  class="form-label">No. de Exterior</label>
            <input type="number" class="form-control" id="num_exterior" name="num_exterior" max="20000" value="{{$empleado->outdoor_number}}" >
          </div>
          <div class="col-md-2">
            <label  class="form-label">No. de Interior</label>
            <input type="number" class="form-control" id="num_interior" name="num_interior" value="{{$empleado->interior_number}}" max="20000">
            @error('num_interior')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-1">
            <label  class="form-label">CP</label>
            <input type="number" class="form-control" id="cp" name="cp" min="20000" max="99999"  value="{{$empleado->cp}}" >
            @error('cp')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label  class="form-label">Localidad</label>
            <input type="text" class="form-control" id="localidad" name="localidad" minlength="5" maxlength="85"  value="{{$empleado->locality}}" >
            @error('localidad')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-12">
            <h3>Datos Bancarios</h3>
        </div>
        <div class="col-md-4">
            <label  class="form-label">Numero de Cuenta</label>
            <input type="number" class="form-control" id="num_cuenta" name="num_cuenta" maxlength="10"  value="{{$empleado->account_number}}" >
            @error('num_cuenta')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label  class="form-label">CLABE</label>
            <input type="number" class="form-control" id="clabe" name="clabe" maxlength="18" value="{{$empleado->clabe}}" >
            @error('clabe')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label class="form-label">Institución Bancaria</label>
            <select  class="form-select" id="banco_id" name="banco_id" >
              <option selected value="{{$empleado->bank_id}}">{{$empleado->bank->name.' (Seleccionado)'}}</option>
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