  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="bajaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header text-bg-info">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Baja Nominal</h1>
          <button wire:click="cerrarModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form wire:submit="bajaEmpleado">
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
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Motivo de baja</label>
                    <div class="col-sm-2">
                    <select wire:model="motivo_baja" id="motivo_baja" name="motivo_baja" class="form-select form-select-lg" required>
                      <option selected value="">Elije...</option>
                      <option>Renuncia</option>
                      <option>Defuncion</option>
                    </select>
                    @error('motivo_baja')<br><small style="color: red">{{ $message }}</small>
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