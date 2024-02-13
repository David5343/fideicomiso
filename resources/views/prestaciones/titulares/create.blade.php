@extends('layouts.app')
@section('content')
    <p class="text-end">
        <a href="{{ route('prestaciones.titulares.create') }}" class="btn btn-secondary" role="button">
            crear Titular</a>
            <a href="{{ route('prestaciones.titulares.index') }}" class="btn btn-secondary" role="button">
                Lista de Titulares</a>
    </p>
    <div class="card mt-1" style="border-color:#333333">
        {{-- <div class="card-header bg-primary text-bg-primary p-3 fs-5 rounded"> --}}
        <div  class="card-header p-3 fs-5 rounded" style="background-color:#333333; color:#b09a5b">
            Prestaciones/Crear Registro de Titular
        </div>
        <livewire:prestaciones.titulares.create-titulares />
    </div>
@endsection