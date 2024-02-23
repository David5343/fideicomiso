@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('humanos.navbar.index') }}" class="btn btn-secondary" role="button">
         Lista de  Texto de Navbar</a> 
    </p>
    <div class="card mt-1" style="border-color:#333333">
        <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
            Humanos/Navbar
        </div>
        @if (session('msg_tipo'))
        <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif        
    <div class="row m-3">
        <form action="{{ url('humanos/navbar/' . $row->id) }}" method="POST">
            @method('PUT')
            @csrf
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
                <h3>Agregar texto a Navbar</h3>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label text-end">Texto</label>
                <div class="col-sm-6">
                    <textarea  id="texto" name="texto" class="form-control" 
                    rows="2" required>{{$row->text}}</textarea>
                   @error('texto')<br><small style="color: red">{{ $message }}</small>
                   @enderror
                </div>
              </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label text-end">Tamaño de texto</label>
              <div class="col-md-3">
                <select id="size" name="size" class="form-select" required>
                <option selected value="{{$row->size}}">{{$row->size}}(Seleccionado)</option>
                <option value="fs-1">fs-1</option>
                <option value="fs-2">fs-2</option>
                <option value="fs-3">fs-3</option>
                <option value="fs-4">fs-4</option>
                <option value="fs-5">fs-5</option>
                <option value="fs-6">fs-6</option>
                </select>
                @error('size')<br><small style="color: red">{{ $message }}</small>
                @enderror
              </div>
            </div> 

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label text-end"></label>
                <div class="col-sm-6">
                  <button  type="submit" class="btn btn-success">Guardar</button>
                  <a href="{{ route('humanos.navbar.index') }}" class="btn btn-danger" role="button">Cancelar</a>
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
    </div>
@endsection
