@extends('layouts.app')
@section('content')
<p class="text-end">
    <a href="{{ route('humanos.slider.create') }}" class="btn btn-secondary" role="button">
        <i class="bi bi-images"></i> Agregar Sliders</a>         
</p>
    <div class="card mt-1" style="border-color:#333333">
        <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
            Humanos/Lista de Slider
        </div>
        @if (session('msg_tipo'))
        <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-12 p-3">       
    <table class="table" id="lista">
        @if ($lista->count())
            <caption> ({{ $lista->count() }}) Registros mas recientes.</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @if ($lista->count())
                @foreach ($lista as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->img }}</td>
                        <td>
                            <a href="{{ url('humanos/slider/'.$item->id .'/edit')}}" class="btn btn-secondary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @else
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Ups!</strong> No se encontro ningun registro.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
</div> 
    </div>
@endsection
