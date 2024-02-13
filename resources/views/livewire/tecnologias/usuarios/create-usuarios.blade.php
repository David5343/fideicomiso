  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="crearUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#333333; color:#b09a5b">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Usuario</h1>
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
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Nombre</label>
                    <div class="col-sm-4">
                      <input type="text" wire:model="nombre" min="10" max="50" 
                      class="form-control form-control-lg @error('nombre') is-invalid @enderror" 
                      placeholder="Nombre Completo" required>
                      @error('nombre')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Usuario</label>
                    <div class="col-sm-4">
                      <input type="email" wire:model="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                      minlength="10" maxlength="60" placeholder="usuario@fidsecpol.gob.mx" required>
                      @error('email')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Contraseña</label>
                    <div class="col-sm-4">
                      <input type="password" wire:model="password" min="8" placeholder="Minimo 8 caracteres"
                      class="form-control form-control-lg @error('password') is-invalid @enderror" required>
                      @error('password')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>     
            </form>
        </div>
        <div class="modal-footer ">
          <button wire:click="cerrarModal" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button wire:click="guardar" type="button" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </div>
  </div>
