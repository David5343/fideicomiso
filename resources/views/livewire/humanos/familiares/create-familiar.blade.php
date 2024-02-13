  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="crearFamiliar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#333333; color:#b09a5b">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Familiar</h1>
          <button wire:click="cerrarModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form wire:submit="createFamily">
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Empleado</label>
                    <div class="col-md-5">
                      <select wire:model="empleado_id" id="empleado_id" name="empleado_id"
                       class="form-select form-select-lg" required>
                      <option selected value="">Selecciona un Empleado</option>
                      @foreach ($select as $e)
                      <option value="{{ $e->id }}">{{ $e->last_name_1.' '.$e->last_name_2.' '.$e->name }}</option>
                      @endforeach
                      </select>
                      @error('empleado_id')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>     
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Apellido Paterno</label>
                    <div class="col-sm-4">
                      <input wire:model="apaterno" type="text" id="apaterno" name="apaterno"
                      class="form-control" required>
                      @error('apaterno')<br><small style="color: red">{{ $message }}</small>
                      @enderror    
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Apellido Materno</label>
                    <div class="col-sm-4">
                      <input wire:model="amaterno" type="text" id="amaterno" name="amaterno"
                      class="form-control" required>
                      @error('amaterno')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-sm-5">
                      <input wire:model="nombre" type="text" id="nombre" name="nombre"
                      class="form-control" required>
                      @error('nombre')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Fecha de Ingreso</label>
                    <div class="col-sm-3">
                      <input wire:model="fecha_ingreso" type="date" id="fecha_ingreso" name="fecha_ingreso"
                       class="form-control" required>
                       @error('fecha_ingreso')<br><small style="color: red">{{ $message }}</small>
                       @enderror     
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">CURP</label>
                    <div class="col-sm-4">
                      <input wire:model="curp" type="text" id="curp" name="curp" class="form-control">
                      @error('curp')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Parentesco</label>
                    <div class="col-sm-2">
                    <select wire:model="parentesco" id="parentesco" name="parentesco" class="form-select form-select-lg" required>
                      <option selected value="">Elije...</option>
                      <option>Padre</option>
                      <option>Madre</option>
                      <option>Esposa</option>
                      <option>Hijo</option>
                      <option>Hija</option>
                    </select>
                    @error('parentesco')<br><small style="color: red">{{ $message }}</small>
                    @enderror
                    </div>
                  </div>                  
        </div>
        <div class="modal-footer">
          <button wire:click="cerrarModal" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-success">Guardar</button>
        </form>
        </div>
      </div>
    </div>
  </div>