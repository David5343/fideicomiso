@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('prestaciones.titulares.create') }}" class="btn btn-primary" role="button">
            <i class="bi bi-person-up"></i> Crear Titular</a>         
    </p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Prestaciones/Lista de Titulares
        </div>
        @if (session('msg_tipo'))
        <div class="alert alert-{{ session('msg_tipo') }} alert-dismissible fade show m-4 p-4" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <livewire:prestaciones.titulares.index-titulares />
    </div>
@endsection
