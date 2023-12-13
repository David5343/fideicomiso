  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="crearPlaza" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header text-bg-info">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Plaza</h1>
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
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">No. de Plaza</label>
                    <div class="col-sm-2">
                      <input type="text" wire:model="num_plaza" minlength="3" maxlength="5" class="form-control form-control-lg @error('num_plaza') is-invalid @enderror" id="num_plaza" name="num_plaza" required>
                      @error('num_plaza')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Puesto</label>
                    <div class="col-md-5">
                      <select wire:model="puesto" class="form-select form-select-lg @error('puesto') is-invalid @enderror" required>
                      <option selected value="">Selecciona un Puesto</option>
                      <option value="Coordinador General">Coordinador General</option>
                      <option value="Administrador General">Administrador General</option>
                      <option value="Analista Informático">Analista Informático</option>
                      <option value="Auxiliar Administrativo">Auxiliar Administrativo</option>
                      <option value="Analista Administrativo">Analista Administrativo</option>
                      <option value="Coordinador Médico">Coordinador Médico</option>
                      <option value="Jefe de Recursos Humanos">Jefe de Recursos Humanos</option>
                      <option value="Jefe de Recursos Financieros">Jefe de Recursos Financieros</option>
                      <option value="Jefe de Prestaciones Socio-económicas">Jefe de Prestaciones Socio-económicas</option>
                      <option value="Jefe de Recursos Materiales">Jefe de Recursos Materiales</option>
                      <option value="Jefe de Área Jurídica">Jefe de Área Jurídica</option>
                      </select>
                      @error('puesto')<br><small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                  </div> 
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label col-form-label-lg text-end">Categoria</label>
                    <div class="col-md-5">
                      <select wire:model="categoria_id" class="form-select form-select-lg @error('categoria_id') is-invalid @enderror" required>
                      <option selected value="">Selecciona una Categoria</option>
                      @foreach ($select as $e)
                      <option value="{{ $e->id }}">{{ $e->name }}</option>
                      @endforeach
                      </select>
                      @error('categoria_id')<br><small style="color: red">{{ $message }}</small>
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