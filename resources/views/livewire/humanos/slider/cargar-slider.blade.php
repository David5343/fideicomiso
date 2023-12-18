<div class="row m-3">
    <form wire:submit.prevent="cargarSlider">
        <div class="col-12">
            <h3>Imagen 1</h3>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Titulo</label>
            <div class="col-sm-6">
              <input type="text" wire:model="titulo_1" id="titulo_1" name="titulo_1" class="form-control form-control-lg"
               required>
              @error('titulo_1')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Texto</label>
            <div class="col-sm-6">
                <textarea wire:model="texto_1" id="texto_1" name="texto_1" class="form-control form-control-lg" 
                rows="2" required></textarea>
               @error('texto_1')<br><small style="color: red">{{ $message }}</small>
               @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Imagen</label>
            <div class="col-sm-6">
                <input wire:model="imagen_1" type="file" id="imagen_1" name="imagen_1"
                class="form-control form-control-lg" accept="image/png, image/jpeg" required>
                @error('imagen_1')<br><small style="color: red">{{ $message }}</small>
                @enderror
                <div class="m-3 text-center">
                    <div wire:loading wire:target='imagen_1' class="spinner-border" style="width:3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                </div>
            </div>
          </div>
          {{-- <div class="col-12">
            <h3>Imagen 2</h3>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Titulo</label>
            <div class="col-sm-6">
              <input type="text" wire:model="titulo_2" id="titulo_2" name="titulo_2" class="form-control form-control-lg"
               >
              @error('titulo_2')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Texto</label>
            <div class="col-sm-6">
                <textarea wire:model="texto_2" id="texto_2" name="texto_2" class="form-control form-control-lg" 
                rows="2"></textarea>
               @error('texto_2')<br><small style="color: red">{{ $message }}</small>
               @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Imagen</label>
            <div class="col-sm-6">
                <input wire:model="imagen_2" type="file" id="imagen_2" name="imagen_2"
                class="form-control form-control-lg" accept="image/png, image/jpeg">
                @error('imagen_2')<br><small style="color: red">{{ $message }}</small>
                @enderror
                <div class="m-3 text-center">
                    <div wire:loading wire:target='imagen_2' class="spinner-border" style="width:3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                </div>
            </div>
          </div>
          <div class="col-12">
            <h3>Imagen 3</h3>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Titulo</label>
            <div class="col-sm-6">
              <input type="text" wire:model="titulo_3" id="titulo_3" name="titulo_3" class="form-control form-control-lg"
               >
              @error('titulo_3')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Texto</label>
            <div class="col-sm-6">
                <textarea wire:model="texto_3" id="texto_3" name="texto_3" class="form-control form-control-lg" 
                rows="2"></textarea>
               @error('texto_3')<br><small style="color: red">{{ $message }}</small>
               @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end">Imagen</label>
            <div class="col-sm-6">
                <input wire:model='imagen_3' type="file" id="imagen_3" name="imagen_3"
                class="form-control form-control-lg" accept="image/png, image/jpeg">
                @error('imagen_3')<br><small style="color: red">{{ $message }}</small>
                @enderror
                <div class="m-3 text-center">
                    <div wire:loading wire:target='imagen_3' class="spinner-border" style="width:3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                </div>
            </div>
          </div> --}}
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label col-form-label-lg text-end"></label>
            <div class="col-sm-6">
                <button type="button" class="btn btn-danger" wire:click="cerrarModal"
                data-bs-dismiss="modal">Cerrar</button>
            <button wire:loading.attr='disabled'class="btn btn-success">Guardar</button>
            <div wire:loading wire:target='cargarSlider' class="m-2">
                Enviando...
              </div>
            </div>
          </div>           
          </form>
</div>
