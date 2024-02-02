<div>
    <form wire:submit="guardar" class="row g-3 m-3">
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
      @if (session('msg_tipo'))
      <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
          {{ session('msg') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      </div>
          <div class="col-12">
              <h3>Datos Generales.</h3>
              <h6>(*) Campos Obligatorios</h6>
          </div>
          <div class="col-md-2">
            <label  class="form-label">No de Expediente</label>
            <input type="text" class="form-control" id="no_expediente" name="no_expediente" minlength="2" maxlength="20" value="{{$no_expediente}}" disabled>
            @error('no_expediente')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-7">
            <label class="form-label">* Dependencia</label>
            <select wire:model="subdepe_id" class="form-select" id="subdepe_id" name="subdepe_id" value="{{old('subdepe_id')}}" required>
              <option selected value="">Elije...</option>
              @foreach($select1 as $sd)
              <option value="{{$sd->id}}">{{$sd->name}}</option>
              @endforeach
          </select>
          @error('subdepe_id')<br><small style="color: red">{{ $message }}</small>
          @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">* Fecha de Ingreso</label>
            <input wire:model="fecha_ingreso" type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="{{old('fecha_ingreso')}}" required>
            @error('fecha_ingreso')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">* Lugar de Trabajo</label>
            <input wire:model="lugar_trabajo" type="text" class="form-control" list="datalistMunicipios"  id="lugar_trabajo" name="lugar_trabajo" minlength="3" maxlength="85" value="{{old('lugar_trabajo')}}" required>
            <datalist id="datalistMunicipios">
              @foreach($select3 as $m)
              <option value="{{$m->name}}">
              @endforeach   
            </datalist>
            @error('lugar_trabajo')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-5">
            <label  class="form-label">Motivo de alta</label>
            <input wire:model="motivo_alta" type="text" class="form-control" id="motivo_alta" name="motivo_alta" 
            placeholder="Se da de alta registro con oficio no. 45687963352123 (Si aplica)" minlength="2" maxlength="120" value="{{old('motivo_alta')}}" >
            @error('motivo_alta')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-2">
            <label class="form-label">* Estatus</label>
            <select wire:model="estatus_afiliado" id="estatus_afiliado" name="estatus_afiliado" class="form-select" required>
              <option selected value="">Elije..</option>
              <option>Preafiliado</option>
              <option>Activo</option>
              <option>Baja</option>
            </select>
            @error('estatus_afiliado')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-12">
            <label  class="form-label">Observaciones</label>
            <textarea wire:model="observaciones" id="observaciones" name="observaciones" class="form-control" 
            rows="2"></textarea>
            @error('observaciones')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>        
          <div class="col-12">
              <h3>Datos Personales.</h3>
          </div>
          <div class="col-md-3">
            <label  class="form-label">* Apellido Paterno (Primer Apellido)</label>
            <input wire:model="apaterno" type="text" class="form-control" id="apaterno" name="apaterno" minlength="2" maxlength="20" value="{{old('apaterno')}}" required>
            @error('apaterno')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-3">
            <label  class="form-label">* Apellido Materno (Segundo Apellido)</label>
            <input wire:model="amaterno" type="text" class="form-control" id="amaterno" name="amaterno" minlength="2" maxlength="20" value="{{old('amaterno')}}" required>
            @error('amaterno')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-3">
              <label  class="form-label">* Nombre</label>
              <input wire:model="nombre" type="text" class="form-control" id="nombre" name="nombre" minlength="2" maxlength="20" value="{{old('nombre')}}" required>
              @error('nombre')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
          <div class="col-md-3">
              <label class="form-label">* Fecha de Nacimiento</label>
              <input wire:model="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
              @error('fecha_nacimiento')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-3">
              <label class="form-label">Lugar de Nacimiento</label>
              <input wire:model="lugar_nacimiento" type="text" class="form-control" list="datalistMunicipios"  id="lugar_nacimiento" name="lugar_nacimiento" minlength="3" maxlength="85" value="{{old('lugar_nacimiento')}}">
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
              <select wire:model="sexo" id="sexo" name="sexo" class="form-select" >
                <option selected value="">Elije...</option>
                <option>Hombre</option>
                <option>Mujer</option>
              </select>
              @error('sexo')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-3">
              <label class="form-label">Estado Civil</label>
              <select wire:model="estado_civil" id="estado_civil" name="estado_civil" class="form-select" >
                <option selected value="">Elije...</option>
                <option>Soltero/a</option>
                <option>Casado/a</option>
                <option>Divorciado/a</option>
                <option>Separado/a en proceso Judicial</option>
                <option>Viudo/a</option>
                <option>Union Libre</option>
                <option>Concubinato</option>
              </select>
              @error('estado_civil')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>   
            <div class="col-md-3">
              <label  class="form-label">* RFC</label>
              <input wire:model="rfc" type="text" class="form-control" id="rfc" name="rfc" maxlength="13" value="{{old('rfc')}}" required>
              @error('rfc')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-3">
              <label  class="form-label">CURP</label>
              <input wire:model="curp" type="text" class="form-control" id="curp" name="curp" maxlength="18" value="{{old('curp')}}" >
              @error('curp')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-2">
              <label  class="form-label">Telefono</label>
              <input wire:model="telefono" type="phone" class="form-control" id="telefono" name="telefono" size="10" value="{{old('telefono')}}" >
              @error('telefono')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-4">
              <label  class="form-label">Correo Electrónico</label>
              <input wire:model="email" type="email" class="form-control" id="email" name="email" maxlength="50" value="{{old('email')}}" >
              @error('email')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-12">
              <h3>Dirección</h3>
          </div>
          <div class="col-md-3">
              <label class="form-label">Entidad Federativa</label>
              <input wire:model="estado" type="text" class="form-control" list="datalistEstados" id="estado" name="estado" minlength="3" maxlength="85" value="{{old('estado')}}">
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
              <input wire:model="municipio" type="text" class="form-control" list="datalistMunicipios"  id="municipio" name="municipio" minlength="3" maxlength="85" value="{{old('municipio')}}">
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
              <input wire:model="colonia" type="text" class="form-control" id="colonia" name="colonia" minlength="3" maxlength="50"  value="{{old('colonia')}}" >
              @error('colonia')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-3">
              <label  class="form-label">Tipo de Vialidad</label>
              <input wire:model="tipo_vialidad" type="text" class="form-control" id="tipo_vialidad" name="tipo_vialidad" minlength="3" maxlength="50" value="{{old('tipo_vialidad')}}" >
              @error('tipo_vialidad')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-3">
              <label  class="form-label">Nombre de la Vialidad(Calle)</label>
              <input wire:model="calle" type="text" class="form-control" id="calle" name="calle" minlength="3" maxlength="50" value="{{old('calle')}}" >
              @error('calle')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-2">
              <label  class="form-label">No. de Exterior</label>
              <input wire:model="num_exterior" type="text" class="form-control" id="num_exterior" name="num_exterior" value="{{old('num_exterior')}}" >
            </div>
            <div class="col-md-2">
              <label  class="form-label">No. de Interior</label>
              <input wire:model="num_interior" type="text" class="form-control" id="num_interior" name="num_interior" value="{{old('num_interior')}}">
              @error('num_interior')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-md-2">
              <label  class="form-label">CP</label>
              <input wire:model="cp" type="number" class="form-control" id="cp" name="cp" min="20000" max="99999"  value="{{old('cp')}}" >
              @error('cp')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div> 
            <div class="col-md-4">
              <label  class="form-label">Localidad</label>
              <input wire:model="localidad" type="text" class="form-control" id="localidad" name="localidad" minlength="5" maxlength="85"  value="{{old('localidad')}}" >
              @error('localidad')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div> 
            <div class="col-12">
              <h3>Datos Bancarios</h3>
          </div>
          <div class="col-md-4">
              <label  class="form-label">Numero de Cuenta</label>
              <input wire:model="num_cuenta" type="number" class="form-control" id="num_cuenta" name="num_cuenta" maxlength="10"  value="{{old('num_cuenta')}}" >
              @error('num_cuenta')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div> 
            <div class="col-md-4">
              <label  class="form-label">CLABE</label>
              <input wire:model="clabe" type="number" class="form-control" id="clabe" name="clabe" maxlength="18" value="{{old('clabe')}}" >
              @error('clabe')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div> 
            <div class="col-md-4">
              <label class="form-label">Institución Bancaria</label>
              <select wire:model="banco_id" class="form-select" id="banco_id" name="banco_id" >
                <option selected value="null">Elije...</option>
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
            <input wire:model="nombre_representante" type="text" class="form-control" id="nombre_representante" name="nombre_representante" minlength="2" maxlength="40" value="{{old('nombre_representante')}}" >
            @error('nombre_representante')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">RFC</label>
            <input wire:model="rfc_representante" type="text" class="form-control" id="rfc_representante" name="rfc_representante" minlength="2" maxlength="13" value="{{old('rfc_representante')}}" >
            @error('rfc_representante')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label  class="form-label">CURP</label>
            <input wire:model="curp_representante" type="text" class="form-control" id="curp_representante" name="curp_representante" minlength="2" maxlength="18" value="{{old('apaterno')}}" >
            @error('curp_representante')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-md-3">
            <label class="form-label">Parentesco</label>
            <select wire:model="parentesco_representante" id="parentesco_representante" name="parentesco_representante" class="form-select" >
              <option selected value="">Elije...</option>
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
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Guardar</button>
            <a href="{{ route('prestaciones.titulares.index') }}" class="btn btn-danger" role="button">Cancelar</a>
          </div>
        </form>
</div>
