  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="crearCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#333333; color:#b09a5b">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Categoria</h1>
          <button wire:click="cerrarModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form wire:submit.prevent="createCategory">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-sm-4">
                      <input type="text" wire:model="nombre" id="nombre" name="nombre" 
                      class="form-control form-control-lg" required>
                      @error('nombre')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Sueldo</label>
                    <div class="col-sm-2">
                      <input type="number" wire:model="sueldo" id="sueldo" name="sueldo"
                       class="form-control form-control-lg" min="0" max="9999999999.99" step="0.01" required>
                      @error('sueldo')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Compensación</label>
                    <div class="col-sm-2">
                      <input type="number" wire:model="compensacion" id="compensacion" name="compensacion" 
                      class="form-control form-control-lg" min="0" max="9999999999.99" step="0.01" required>
                      @error('compensacion')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Complementaria</label>
                    <div class="col-sm-2">
                      <input type="number" wire:model="complementaria" id="complementaria" name="complementaria"
                       class="form-control form-control-lg" min="0" max="9999999999.99" step="0.01" required>
                      @error('complementaria')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">ISR</label>
                    <div class="col-sm-2">
                      <input type="number" wire:model="isr" id="isr" name="isr" 
                      class="form-control form-control-lg" min="0" max="9999999999.99" step="0.01" required>
                      @error('isr')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Plazas Autorizadas</label>
                    <div class="col-sm-2">
                      <input type="number" wire:model="plazas_autorizadas" id="plazas_autoriadas" name="plazas_autorizadas"
                       class="form-control form-control-lg" required>
                      @error('plazas_autorizadas')<br><small style="color: red">{{ $message }}</small>
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