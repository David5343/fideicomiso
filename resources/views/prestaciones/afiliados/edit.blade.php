@extends('layouts.app')
@section('content')
<p class="text-end"><a href="{{ route('prestaciones.afiliados.index') }}" class="btn btn-primary" role="button">Lista de  Afiliados</a></p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Prestaciones/Editar Afiliado
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
      <form class="row g-3 m-3" action="{{ url('prestaciones/afiliados/' . $afiliado->id) }}" method="POST">
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
            <h3>Datos Generales.</h3>
        </div>
        <div class="col-md-2">
          <label  class="form-label">No de Expediente</label>
          <input type="text" class="form-control" id="no_expediente" name="no_expediente" minlength="2" maxlength="20" value="{{$afiliado->file_number}}" disabled>
          <input type="hidden" id="expediente_hidden" name="expediente_hidden" value="{{$afiliado->file_number}}">
          @error('no_expediente')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-7">
          <label class="form-label">Dependencia</label>
          <select  class="form-select" id="subdepe_id" name="subdepe_id">
            <option selected value="{{$afiliado->subdependency->id}}">{{$afiliado->subdependency->name.' (Selecionado)'}}</option>
            @foreach($select1 as $sd)
            <option value="{{$sd->id}}">{{$sd->name}}</option>
            @endforeach
        </select>
        @error('subdepe_id')<br><small style="color: red">{{ $message }}</small>
        @enderror
        </div>
        <div class="col-md-3">
          <label class="form-label">Fecha de Ingreso</label>
          <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{$afiliado->start_date}}" >
          @error('fecha_ingreso')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-3">
          <label class="form-label">Lugar de Trabajo</label>
          <input type="text" class="form-control" list="datalistMunicipios"  id="lugar_trabajo" name="lugar_trabajo" minlength="3" maxlength="85" value="{{$afiliado->work_place}}">
          <datalist id="datalistMunicipios">
            @foreach($select3 as $m)
            <option value="{{$m->name}}">
            @endforeach   
          </datalist>
          @error('lugar_trabajo')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-6">
          <label  class="form-label">Motivo de alta</label>
          <input type="text" class="form-control" id="motivo_alta" name="motivo_alta" minlength="2" maxlength="120" value="{{$afiliado->register_motive}}" >
          @error('motivo_alta')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-2">
          <label class="form-label">Estatus</label>
          <select id="estatus_afiliado" name="estatus_afiliado" class="form-select" >
            <option selected value="{{$afiliado->affiliate_status}}">{{$afiliado->affiliate_status.' (Seleccionado)'}}</option>
            <option>Preafiliado</option>
            <option>Activo</option>
            <option>Baja</option>
          </select>
          @error('estatus_afiliado')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-12">
          <label  class="form-label">Observaciones</label>
          <textarea id="observaciones" name="observaciones" class="form-control form-control-lg" 
          rows="2">{{$afiliado->observations}}</textarea>
          @error('observaciones')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-12">
            <h3>Datos Personales.</h3>
        </div>
        <div class="col-md-2">
          <label  class="form-label">Apellido Paterno</label>
          <input type="text" class="form-control" id="apaterno" name="apaterno" minlength="2" maxlength="20" value="{{$afiliado->last_name_1}}" >
          @error('apaterno')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-2">
          <label  class="form-label">Apellido Materno</label>
          <input type="text" class="form-control" id="amaterno" name="amaterno" minlength="2" maxlength="20" value="{{$afiliado->last_name_2}}" >
          @error('amaterno')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-3">
            <label  class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" minlength="2" maxlength="20" value="{{$afiliado->name}}" >
            @error('nombre')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
        <div class="col-md-3">
            <label class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$afiliado->birthday}}" >
            @error('fecha_nacimiento')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">Lugar de Nacimiento</label>
            <input type="text" class="form-control" list="datalistMunicipios"  id="lugar_nacimiento" name="lugar_nacimiento" minlength="3" maxlength="85" value="{{$afiliado->birthplace}}">
            <datalist id="datalistMunicipios">
              @foreach($select3 as $m)
              <option value="{{$m->name}}">
              @endforeach   
            </datalist>
            @error('lugar_nacimiento')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label class="form-label">Sexo</label>
            <select id="sexo" name="sexo" class="form-select" >
              <option selected value="{{$afiliado->sex}}">{{$afiliado->sex.' (Seleccionado)'}}</option>
              <option>Hombre</option>
              <option>Mujer</option>
            </select>
            @error('sexo')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">Estado Civil</label>
            <select id="estado_civil" name="estado_civil" class="form-select" >
              <option selected value="{{$afiliado->marital_status}}">{{$afiliado->marital_status.' (Seleccionado)'}}</option>
              <option>Soltero/a</option>
              <option>Casado/a</option>
              <option>Divorciado/a</option>
              <option>Separado/a en proceso Judicial</option>
              <option>Viudo/a</option>
              <option>Concubinato</option>
            </select>
            @error('estado_civil')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>   
          <div class="col-md-3">
            <label  class="form-label">RFC</label>
            <input type="text" class="form-control" id="rfc" name="rfc" size="13" value="{{$afiliado->rfc}}" >
            @error('rfc')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">CURP</label>
            <input type="text" class="form-control" id="curp" name="curp" size="18" value="{{$afiliado->curp}}" >
            @error('curp')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label  class="form-label">Telefono</label>
            <input type="phone" class="form-control" id="telefono" name="telefono" size="10" value="{{$afiliado->phone}}" >
            @error('telefono')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-4">
            <label  class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="50" value="{{$afiliado->email}}" >
            @error('email')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12">
            <h3>Dirección</h3>
        </div>
        <div class="col-md-3">
            <label class="form-label">Entidad Federativa</label>
            <input type="text" class="form-control" list="datalistEstados" id="estado" name="estado" minlength="3" maxlength="85" value="{{$afiliado->state}}">
            <datalist id="datalistEstados">
              @foreach($select2 as $e)
              <option value="{{$e->name}}">
              @endforeach   
            </datalist>
            @error('estado')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">Municipio o Delegación</label>
            <input type="text" class="form-control" list="datalistMunicipios"  id="municipio" name="municipio" minlength="3" maxlength="85" value="{{$afiliado->county}}">
            <datalist id="datalistMunicipios">
              @foreach($select3 as $m)
              <option value="{{$m->name}}">
              @endforeach   
            </datalist>
            @error('municipio')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-4">
            <label  class="form-label">Colonia</label>
            <input type="text" class="form-control" id="colonia" name="colonia" minlength="3" maxlength="50"  value="{{$afiliado->neighborhood}}" >
            @error('colonia')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Tipo de Vialidad</label>
            <input type="text" class="form-control" id="tipo_vialidad" name="tipo_vialidad" minlength="3" maxlength="50" value="{{$afiliado->roadway_type}}" >
            @error('tipo_vialidad')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">Nombre de la Vialidad(Calle)</label>
            <input type="text" class="form-control" id="calle" name="calle" minlength="3" maxlength="50" value="{{$afiliado->street}}" >
            @error('calle')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label  class="form-label">No. de Exterior</label>
            <input type="number" class="form-control" id="num_exterior" name="num_exterior" max="20000" value="{{$afiliado->outdoor_number}}" >
          </div>
          <div class="col-md-2">
            <label  class="form-label">No. de Interior</label>
            <input type="number" class="form-control" id="num_interior" name="num_interior" value="{{$afiliado->interior_number}}" max="20000">
            @error('num_interior')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label  class="form-label">CP</label>
            <input type="number" class="form-control" id="cp" name="cp" min="20000" max="99999"  value="{{$afiliado->cp}}" >
            @error('cp')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label  class="form-label">Localidad</label>
            <input type="text" class="form-control" id="localidad" name="localidad" minlength="5" maxlength="85"  value="{{$afiliado->locality}}" >
            @error('localidad')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-12">
            <h3>Datos Bancarios</h3>
        </div>
        <div class="col-md-4">
            <label  class="form-label">Numero de Cuenta</label>
            <input type="number" class="form-control" id="num_cuenta" name="num_cuenta" maxlength="10"  value="{{$afiliado->account_number}}" >
            @error('num_cuenta')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label  class="form-label">CLABE</label>
            <input type="number" class="form-control" id="clabe" name="clabe" maxlength="18" value="{{$afiliado->clabe}}" >
            @error('clabe')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div> 
          <div class="col-md-4">
            <label class="form-label">Institución Bancaria</label>
            <select  class="form-select" id="banco_id" name="banco_id" >
              <option selected value=""></option>
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
          <input type="text" class="form-control" id="nombre_representante" name="nombre_representante" minlength="2" maxlength="20" value="{{$afiliado->representative_name}}" >
          @error('nombre_representante')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-3">
          <label  class="form-label">RFC</label>
          <input type="text" class="form-control" id="rfc_representante" name="rfc_representante" minlength="2" maxlength="20" value="{{$afiliado->representative_rfc}}" >
          @error('rfc_representante')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-3">
          <label  class="form-label">CURP</label>
          <input type="text" class="form-control" id="curp_representante" name="curp_representante" minlength="2" maxlength="20" value="{{$afiliado->representative_curp}}" >
          @error('curp_representante')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-3">
          <label class="form-label">Parentesco</label>
          <select id="parentesco_representante" name="parentesco_representante" class="form-select" >
            <option selected value="{{$afiliado->representative_relationship}}">{{$afiliado->representative_relationship.' (Seleccionado)'}}</option>
            <option>Padre</option>
            <option>Madre</option>
            <option>Esposo/a</option>
            <option>Hijo/a</option>
            <option>Nieto/a</option>
            <option>Hermano/a</option>
          </select>
          @error('parentesco_representante')<br><small style="color: red">{{ $message }}</small>
          @enderror
        </div>          
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <a href="{{ route('prestaciones.afiliados.index') }}" class="btn btn-danger" role="button">Cancelar</a>
        </div>
      </form>
    </div>
@endsection