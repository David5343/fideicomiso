  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="crearSubdependencia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#333333; color:#b09a5b">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Subdependencia</h1>
          <button wire:click="cerrarModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form wire:submit.prevent="createSubdependency">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-md-8">
                      <input type="text" wire:model="nombre" id="nombre" name="nombre" class="form-control form-control-lg" required>
                      @error('nombre')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Dependencia</label>
                    <div class="col-md-5">
                      <select wire:model="dependencia_id" id="dependencia_id" name="dependencia_id"
                       class="form-select form-select-lg" required>
                      <option selected value="">Selecciona una Dependencia</option>
                      @foreach ($select as $e)
                      <option value="{{ $e->id }}">{{ $e->name }}</option>
                      @endforeach
                      </select>
                      @error('dependecia_id')<br><small style="color: red">{{ $message }}</small>
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