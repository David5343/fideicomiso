  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="crearDependencia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header text-bg-info">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Dependencia</h1>
          <button wire:click="cerrarModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form wire:submit.prevent="createDependency">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-md-8">
                      <input type="text" wire:model="nombre" id="nombre" name="nombre" class="form-control form-control-lg" required>
                      @error('nombre')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>     
            
        </div>
        <div class="modal-footer">
          <button wire:click="cerrarModal" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button  class="btn btn-success">Guardar</button>
        </form>
        </div>
      </div>
    </div>
  </div>