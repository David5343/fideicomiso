@extends('layouts.app')
@section('content')
    <p class="text-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearSubdependencia">
            Crear Subdependencia
        </button>
    </p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Prestaciones/Lista de Subdependencias
        </div>
        @if (session('msg_tipo'))
        <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <livewire:prestaciones.subdependencias.index-subdependencias />
    </div>
    <livewire:prestaciones.subdependencias.create-subdependencias />
    {{-- <livewire:humanos.areas.edit-area /> --}}
@endsection
