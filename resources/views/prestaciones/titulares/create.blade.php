@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('prestaciones.titulares.create') }}" class="btn btn-primary" role="button">
            crear Titular</a>
            <a href="{{ route('prestaciones.titulares.index') }}" class="btn btn-primary" role="button">
                Lista de Titulares</a>
    </p>
    <div class="card mt-1 border-primary">
        <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded">
            Prestaciones/Crear Registro de Titular
        </div>
        <livewire:prestaciones.titulares.create-titulares />
    </div>
@endsection