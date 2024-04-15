@extends('layouts.app')
@section('content')
    <p class="text-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#crearCategoria">
            Crear Categoria
        </button>
    </p>
    <div class="card mt-1" style="border-color:#333333">
        <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
            Prestaciones/Lista de Categorías Policiales
        </div>
        @if (session('msg_tipo'))
        <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <livewire:prestaciones.categorias.index-categorias />
    </div>
    <livewire:prestaciones.categorias.create-categorias />
@endsection
