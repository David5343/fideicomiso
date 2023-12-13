<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="firmaModal" tabindex="-1" aria-labelledby="firmaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-bg-info">
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
                <form wire:submit.prevent="cargarFirma">                     
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Empleado</label>
                            <div class="col-md-6">
                              <select wire:model="empleado_id" id="empleado_id" name="empleado_id" class="form-select form-select-lg @error('empleado_id') is-invalid @enderror" required>
                              <option selected value="">Selecciona un Empleado</option>
                              @foreach ($empleados as $e)
                              <option value="{{ $e->id }}">{{ $e->last_name_1.' '.$e->last_name_2.' '.$e->name }}</option>
                              @endforeach
                              </select>
                            </div>
                          </div> 
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Firma</label>
                            <div class="col-md-6">
                                <input wire:model='firma' type="file" class="form-control form-control-lg @error('firma') is-invalid @enderror" id="firma" name="firma" accept="image/png, image/jpeg">
                            </div>
                            <div class="m-2">
                            @if($firma)
                            <p class="text-center">
                              <img src="{{$firma->temporaryUrl()}}" width="300">
                            </p>
                            @endif
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
