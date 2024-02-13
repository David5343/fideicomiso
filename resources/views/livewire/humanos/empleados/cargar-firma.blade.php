<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="firmaModal" tabindex="-1" aria-labelledby="firmaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#333333; color:#b09a5b">
                <h5 class="modal-title" id="fotoModalLabel">Cargar Firma</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="cerrarModal"></button>
            </div>
                <div class="modal-body">
                    @if (session('msg_tipo_modal'))
                    <div class="col-md-12">
                    <div class="alert alert-{{ session('msg_tipo_modal') }} alert-dismissible fade show m-4 p-4" role="alert">
                        {{ session('msg_modal') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif 
                <form wire:submit="cargarFirma">                     
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Empleado</label>
                            <div class="col-md-6">
                              <select wire:model="empleado_id" id="empleado_id" name="empleado_id" class="form-select form-select-lg" required>
                              <option selected value="">Selecciona un Empleado</option>
                              @foreach ($empleados as $e)
                              <option value="{{ $e->id }}">{{ $e->last_name_1.' '.$e->last_name_2.' '.$e->name }}</option>
                              @endforeach
                              </select>
                              @error('empleado_id')<br><small style="color: red">{{ $message }}</small>
                              @enderror
                            </div>
                          </div> 
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Firma</label>
                            <div class="col-md-6">
                                <input wire:model='firma' type="file" id="firma" name="firma"
                                class="form-control form-control-lg" accept="image/png, image/jpeg" required>
                                @error('firma')<br><small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="m-3 text-center">
                                    <div wire:loading wire:target='firma' class="spinner-border" style="width:3rem; height: 3rem;" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                      </div>
                                      @if($firma)
                                    <p class="text-center">
                                      <img src="{{$firma->temporaryUrl()}}" width="300">
                                    </p>
                                    @endif
                                </div>
                            </div>
                          </div>              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="cerrarModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button wire:loading.attr='disabled' type="submit" class="btn btn-success">Guardar</button>
                    <div wire:loading wire:target='cargarFirma' class="m-2">
                        Enviando...
                      </div>
                    </form>
                </div>

        </div>
    </div>
</div>
