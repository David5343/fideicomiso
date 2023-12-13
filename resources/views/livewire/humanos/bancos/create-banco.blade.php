  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="crearBanco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header text-bg-info">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Banco</h1>
          <button wire:click="cerrarModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session('msg_tipo'))
            <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Clave</label>
                    <div class="col-md-2">
                      <input type="text" wire:model="clave" class="form-control form-control-lg @error('clave') is-invalid @enderror">
                      @error('clave')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-md-3">
                      <input type="text" wire:model="nombre" class="form-control form-control-lg @error('nombre') is-invalid @enderror">
                      @error('nombre')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Razon Social</label>
                    <div class="col-md-8">
                      <textarea wire:model="razon_social" class="form-control form-control-lg @error('nombre') is-invalid @enderror" 
                      minlength="5" maxlength="120" rows="2" required></textarea>
                      @error('razon_social')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>     
            </form>
        </div>
        <div class="modal-footer">
          <button wire:click="cerrarModal" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button wire:click="guardar" type="button" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </div>
  </div>