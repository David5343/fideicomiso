<div class="row m-3">
    <form wire:submit="cargarSlider">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
        <div class="col-12">
            <h3>Editar Datos del Slider</h3>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label text-end">Posición en el Slider</label>
          <div class="col-md-5">
            <select wire:model="posicion" id="posicion" name="posicion" class="form-select" required>
            <option selected value=""></option>
            <option value="Primero">Primero</option>
            <option value="Segundo">Segundo</option>
            <option value="Tercero">Tercero</option>
            </select>
            @error('posicion')<br><small style="color: red">{{ $message }}</small>
            @enderror
          </div>
        </div> 
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-end">Título</label>
            <div class="col-sm-6">
              <input type="text" wire:model="titulo" id="titulo" name="titulo" class="form-control"
                required>
              @error('titulo')<br><small style="color: red">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-end">Texto</label>
            <div class="col-sm-6">
                <textarea wire:model="texto" id="texto" name="texto" class="form-control" 
                rows="2" required></textarea>
               @error('texto')<br><small style="color: red">{{ $message }}</small>
               @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-end">Imagen</label>
            <div class="col-sm-6">
                <input wire:model="imagen" type="file" id="imagen" name="imagen"
                class="form-control" accept="image/png, image/jpeg" required>
                @error('imagen')<br><small style="color: red">{{ $message }}</small>
                @enderror
                <div class="m-3 text-center">
                  <div wire:loading wire:target='imagen' class="spinner-border" style="width:3rem; height: 3rem;" role="status">
                      <span class="visually-hidden">Loading...</span>
                    </div>
                    @isset($imagen)
                    <p class="text-center">
                      <img src="{{$imagen->temporaryUrl()}}" width="180">
                    </p>                         
                    @endisset                       
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-end"></label>
            <div class="col-sm-6">
              <button wire:loading.attr='disabled' type="submit" class="btn btn-success">Guardar</button>
              <a href="{{ route('humanos.slider.index') }}" class="btn btn-danger" role="button">Cancelar</a>          
            <div wire:loading wire:target='cargarSlider' class="m-2">
                Enviando...
              </div>
            </div>
          </div>           
          </form>
          <div class="col-12">
            @if (session('msg_tipo'))
            <div class="alert alert-{{session('msg_tipo')}} alert-dismissible fade show m-4 p-4" role="alert">
              <h4 class="alert-heading">Pigd <i class="bi bi-check-circle"></i></h4>
              <p><strong>{{ session('msg')}}</strong></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            </div> 
</div>
